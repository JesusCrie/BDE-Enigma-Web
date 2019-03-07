<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the enigmas unlocked by this user.
     */
    public function unlockedEnigmas() {
        return $this->hasMany('App\UnlockedEnigma');
    }

    /**
     * Get the enigmas owned by this user.
     */
    public function ownedEnigma() {
        return $this->hasMany('App\Enigma');
    }

    /**
     * Get the steps completed by this user.
     */
    public function completedSteps() {
        return $this->hasMany('App\ProgressionEnigma');
    }
}
