<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unlocker extends Model {

    public $timestamps = false;

    /**
     * Get the associated enigma.
     */
    public function enigma() {
        return $this->belongsTo('App\Enigma');
    }
}
