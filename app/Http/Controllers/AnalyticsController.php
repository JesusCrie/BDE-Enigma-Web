<?php

namespace App\Http\Controllers;

use App\Enigma;
use App\EnigmaStep;
use App\ProgressionEnigma;
use App\User;
use Illuminate\Http\Request;

class AnalyticsController extends Controller {

    /**
     * Show the analytics of the enigmas.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stats(Request $request) {
        // Amount of users
        $userAmount = User::all()->count();

        // Query every enigma
        $enigmas = Enigma::all()
            ->sortBy('id')
            ->map(function (Enigma $enigma) use ($userAmount) {

                // Query each step of the enigma and build it
                $steps = $enigma->steps()
                    ->get()
                    ->sortBy('step')
                    ->map(function (EnigmaStep $step) {
                        return $this->buildStep($step);
                    });

                // Check if unlocked and give the name of the user
                $unlockedBy = $enigma->unlocked()->first();
                if ($unlockedBy != null)
                    $unlockedBy = $unlockedBy->user()->first()->name;

                // Amount of participants and winners (completed first step)
                $participants = sizeof($steps[0]['leaderboard']);
                $winners = sizeof($steps[sizeof($steps) - 1]['leaderboard']);

                // Percentage of participants
                $successRate = ($participants / $userAmount) * 100;

                // Percentage of participants who have completed the challenge
                if ($participants != 0)
                    $completionRate = ($winners / $participants) * 100;
                else $completionRate = 0;

                return [
                    'id' => $enigma->id,
                    'name' => $enigma->name,
                    'difficulty' => $enigma->difficulty,
                    'diffColor' => EnigmaController::translateDifficultyToColor($enigma->difficulty),
                    'unlocked_by' => $unlockedBy,
                    'participants' => $participants,
                    'winners' => $winners,
                    'success_rate' => round($successRate, 2),
                    'completion_rate' => round($completionRate, 2),
                    'steps' => $steps
                ];
            });

        return view('analytics', ['enigmas' => $enigmas]);
        //dd($enigmas);
    }

    private function buildStep(EnigmaStep $step) {
        $leaderboard = $step->completedBy()
            ->get()
            ->sortBy('created_at')
            ->map(function (ProgressionEnigma $progression) use ($step) {
                $name = $progression->user()->first()->name;
                $time = date('d/m/Y H:i', strtotime($progression->created_at) + 3600);

                return [
                    'name' => $name,
                    'time' => $time
                ];
            });

        return [
            'step' => $step->step,
            'name' => $step->name,
            'leaderboard' => $leaderboard
        ];
    }
}
