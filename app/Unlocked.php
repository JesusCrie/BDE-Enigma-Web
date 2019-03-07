<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unlocked extends Model {

    protected $primaryKey = 'enigma_id';
    public $incrementing = false;

    /**
     * Get the unlocked enigma.
     */
    public function enigma() {
        return $this->belongsTo('App\Enigma');
    }
}
