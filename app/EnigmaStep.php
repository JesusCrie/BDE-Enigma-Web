<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnigmaStep extends Model {

    public $timestamps = false;

    /**
     * Get the enigma where this step belongs.
     */
    public function enigma() {
        return $this->belongsTo('App\Enigma');
    }

    /**
     * Get the users who have completed this step.
     */
    public function completedBy() {
        return $this->hasMany('App\ProgressionEnigma');
    }

    /**
     * Check if a user has completed this step.
     */
    public function completedByUser(User $user) {
        return $this->completedBy()
            ->where('user_id', $user->id)
            ->count() == 1;
    }
}
