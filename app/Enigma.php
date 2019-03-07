<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enigma extends Model {

    public $timestamps = false;

    public $attributes = [
        'difficulty' => 0
    ];

    /**
     * Get the owner of this enigma
     */
    public function owner() {
        return $this->hasOne('App\User');
    }

    /**
     * Check if enigma is in the unlocked table.
     */
    public function unlocked() {
        return $this->hasOne('App\UnlockedEnigma');
    }

    public function step($id) {
        return $this->steps()
            ->where('step', $id);
    }

    /**
     * Get the steps of this Enigma.
     */
    public function steps() {
        return $this->hasMany('App\EnigmaStep');
    }
}
