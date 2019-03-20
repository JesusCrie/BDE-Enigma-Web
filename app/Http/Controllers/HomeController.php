<?php

namespace App\Http\Controllers;

use App\Enigma;
use App\UnlockedEnigma;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // Query enigmas
        $rawEnigmas = Enigma::all([
            'id', 'name', 'difficulty'
        ]);

        // Map each enigma
        $enigmas = array();
        foreach ($rawEnigmas as $enigma) {
            $enigmas[$enigma->id] = [
                'id' => $enigma->id,
                'name' => $enigma->name,
                'difficulty' => $enigma->difficulty,
                'color' => EnigmaController::translateDifficultyToColor($enigma->difficulty),
                'unlocked' => false
            ];
        }

        // Check unlocked enigmas
        $unlockedEnigmas = UnlockedEnigma::all('enigma_id');
        foreach ($unlockedEnigmas as $unlock) {
            $enigmas[$unlock->enigma_id]['unlocked'] = true;
        }

        return view('home', ['enigmas' => $enigmas]);
    }
}
