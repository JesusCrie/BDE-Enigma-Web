<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnlockedEnigma extends Model {

    protected $primaryKey = 'enigma_id';
    public $incrementing = false;

    /**
     * Get the unlocked enigma.
     */
    public function enigma() {
        return $this->belongsTo('App\Enigma');
    }

    /**
     * Get the user who have unlocked the enigma.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
