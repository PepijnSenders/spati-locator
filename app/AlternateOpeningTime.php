<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class AlternateOpeningTime extends Model
{
    protected $table = 'aleternate_opening_times';

    public function spati()
    {
        return $this->belongsTo('Spati\Spati');
    }
}
