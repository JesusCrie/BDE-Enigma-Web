<?php

namespace App\Http\Controllers;

use App\Enigma;

class EnigmaController extends Controller {

    /**
     * Display the information of an enigma.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $enigma = Enigma::findOrFail($id);
        $enigma->unlocked()->firstOrFail();

        return view('enigma.enigma', [
            'enigma' => $enigma,
            'steps' => $enigma->steps,
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
        $stepReal = $enigma->step($step)
            ->firstOrFail();

        return view('enigma.step', [
            'enigma' => $enigma,
            'step' => $stepReal,
            'completed' => false
        ]);
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
