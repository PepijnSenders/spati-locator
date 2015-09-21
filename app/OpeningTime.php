<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class OpeningTime extends Model
{
    protected $table = 'opening_times';

    public function spati()
    {
        return $this->belongsTo('Spati');
    }
}
