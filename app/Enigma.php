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
        return $this->belongsTo('App\User');
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

    /**
     * Get the amount of steps.
     */
    public function stepsCount() {
        return $this->steps()->count();
    }

    public function stepsUser(User $user) {
        $lastCompleted = ProgressionEnigma::where('user_id', $user->id)
            ->get()
            ->map(function (ProgressionEnigma $progressionEnigma) {
                return $progressionEnigma->enigmaStep;
            })->filter(function (EnigmaStep $step) {
                return $step->enigma->id == $this->id;
            })->max('step');

        return $this->steps()
            ->where('step', '<=', $lastCompleted + 1);
    }

    /**
     * Get the users who have completed the last step of the enigma.
     */
    public function completedBy() {
        return $this->steps()
            ->orderByDesc('step')
            ->first()
            ->completedBy()
            ->get()
            ->map(function (ProgressionEnigma $progressEnigma) {
                return $progressEnigma->user()->first();
            });
    }

    /**
     * Check if the user has completed the enigma.
     */
    public function completedByUser(User $targetUser) {

        return $this->completedBy()
                ->filter(function (User $user) use ($targetUser) {
                    return $user->id === $targetUser->id;
                })->count() == 1;
    }
}
