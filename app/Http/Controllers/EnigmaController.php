<?php

namespace App\Http\Controllers;

use App\Enigma;
use App\ProgressionEnigma;
use App\UnlockedEnigma;
use App\Unlocker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class EnigmaController extends Controller {

    /**
     * Display the information of an enigma.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id) {
        $enigma = Enigma::findOrFail($id);

        // Check if unlocked or throw 404.
        $enigma->unlocked()->firstOrFail();

        $stepsCount = $enigma->stepsCount();
        $userSteps = $enigma->stepsUser(Auth::user())->get();

        return view('enigma.enigma', [
            'enigma' => $enigma,
            'owner' => $enigma->owner->name,
            'steps' => $userSteps,
            'stepsCount' => $stepsCount,
            'completed' => $enigma->completedByUser(Auth::user()),
            'diffColor' => $this->translateDifficultyToColor($enigma->difficulty)
        ]);
    }

    /**
     * Display the given step of an enigma.
     *
     * @param $id
     * @param $step
     * @return \Illuminate\Http\Response
     */
    public function step(int $id, int $step) {
        $enigma = Enigma::findOrFail($id);

        try {
            $stepReal = $enigma->step($step)
                ->firstOrFail();

            // Check previous step
            if (!$this->checkPreviousStepCompleted($enigma, $step)) {
                return redirect()->route('enigma.show', ['id' => $id]);
            }

        } catch (ModelNotFoundException $e) {
            return redirect()->route('enigma.show', ['id' => $id]);
        }

        return view('enigma.step', [
            'enigma' => $enigma,
            'step' => $stepReal,
            'completed' => $stepReal->completedByUser(Auth::user())
        ]);
    }

    /**
     * Attempt to issue a code to unlock an enigma.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlock(Request $request) {
        if (!$request->has('code')) {
            return redirect()->route('home');
        }

        $isKeyValid = DB::table('unlockers')
            ->where([
                ['code', $request->get('code')],
                ['used', false]
            ])
            ->exists();

        if ($isKeyValid) {

            // Unlock enigma
            $unlocker = Unlocker::where('code', $request->get('code'))->firstOrFail();
            $enigmaId = $unlocker->enigma->id;

            $unlocked = new UnlockedEnigma([
                'enigma_id' => $enigmaId,
                'user_id' => Auth::id()
            ]);
            $unlocked->save();

            // Set key to used
            $unlocker->used = true;
            $unlocker->save();

            return redirect()->route('enigma.show', ['id' => $enigmaId]);

        } else {
            $errors = new MessageBag();
            $errors->add('code', 'Code invalide ou d&eacute;j&agrave; expir&eacute; !');

            return redirect()->route('home')->withInput()->withErrors($errors);
        }
    }

    /**
     * Attempt to validate a step.
     *
     * @param Request $request
     * @param $id
     * @param $step
     * @return \Illuminate\Http\Response
     */
    public function completeStep(Request $request, int $id, int $step) {
        $enigma = Enigma::findOrFail($id);
        $stepReal = $enigma->step($step)->firstOrFail();

        // Check previous step
        if (!$this->checkPreviousStepCompleted($enigma, $step)) {
            return redirect()->route('enigma.show', ['id' => $id]);
        }

        $validator = Validator::make($request->all(), [
            'solution' => [
                'required',
                'regex:' . $stepReal->answer_pattern
            ]
        ]);

        if ($validator->fails()) {
            // Validation fails, answer doesn't match the regex
            return back()->withInput()->withErrors($validator);

        } else {
            // Validation succeed, save the progress
            $progression = new ProgressionEnigma([
                'enigma_step_id' => $stepReal->id,
                'user_id' => Auth::id()
            ]);

            $progression->save();

            return redirect()->route('enigma.show', ['id' => $id]);
        }
    }

    private function checkPreviousStepCompleted(Enigma $enigma, int $step) {

        // First step
        if ($step == 1)
            return true;

        $prevStep = $enigma->step($step - 1);

        if ($prevStep->exists()) {
            return $prevStep->first()->completedByUser(Auth::user());
        }

        return false;
    }

    public static function translateDifficultyToColor($diff) {
        switch ($diff) {
            default:
            case 1:
                return 'green';
            case 2:
                return 'yellow';
            case 3:
                return 'orange';
            case 4:
                return 'red';
            case 5:
                return 'purple';
        }
    }

}
