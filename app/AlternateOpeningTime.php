<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class AlternateOpeningTime extends Model
{
    protected $table = 'alternate_opening_times';

    public function spati()
    {
        return $this->belongsTo('Spati\Spati');
    }
}
