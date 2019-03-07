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
}
