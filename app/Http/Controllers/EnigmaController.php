<?php

namespace App\Http\Controllers;

use App\Enigma;
use App\ProgressionEnigma;
use App\UnlockedEnigma;
use App\Unlocker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class EnigmaController extends Controller {

    /**
     * Display the information of an enigma.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $enigma = Enigma::findOrFail($id);

        // Check if unlocked or throw 404.
        $enigma->unlocked()->firstOrFail();

        $stepsCount = $enigma->stepsCount();
        $userSteps = $enigma->stepsUser(Auth::user())->get();

        return view('enigma.enigma', [
            'enigma' => $enigma,
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
    public function step($id, $step) {
        $enigma = Enigma::findOrFail($id);

        try {
            $stepReal = $enigma->step($step)
                ->firstOrFail();

            // Min step = 1
            if ($step > 1) {
                // Check if previous step was completed
                if (!$enigma->step($step - 1)
                    ->firstOrFail()
                    ->completedByUser(Auth::user())) {

                    return redirect()->route('enigma.show', ['id' => $id]);
                }
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

        try {
            $unlocker = Unlocker::where('code', $request->get('code'))->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $errors = new MessageBag();
            $errors->add('code', 'Code invalide !');

            return back()->withInput()->withErrors($errors);
        }

        $enigmaId = $unlocker->enigma->id;

        $unlocked = new UnlockedEnigma([
            'enigma_id' => $enigmaId,
            'user_id' => Auth::id()
        ]);

        if ($unlocked->exists()) {
            $errors = new MessageBag();
            $errors->add('code', 'Code d&eacute;j&agrave; utilis&eacute; !');
            return back()->withErrors($errors);
        }

        $unlocked->save();

        return redirect()->route('enigma.show', ['id' => $enigmaId]);
    }

    /**
     * Attempt to validate a step.
     *
     * @param Request $request
     * @param $id
     * @param $step
     * @return \Illuminate\Http\Response
     */
    public function completeStep(Request $request, $id, $step) {
        $enigma = Enigma::findOrFail($id);
        $stepReal = $enigma->step($step)->firstOrFail();

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

    private function translateDifficultyToColor($diff) {
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
