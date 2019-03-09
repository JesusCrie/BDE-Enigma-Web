<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unlocker extends Model {

    public $timestamps = false;

    protected $casts = [
        'used' => 'boolean'
    ];

    /**
     * Get the associated enigma.
     */
    public function enigma() {
        return $this->belongsTo('App\Enigma');
    }
}
