<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgressionEnigma extends Model {

    /**
     * Get the step of the enigma that has been completed.
     */
    public function enigmaStep() {
        return $this->belongsTo('App\EnigmaStep');
    }

    /**
     * The the user who have completed the step.
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
