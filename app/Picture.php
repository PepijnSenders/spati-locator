<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'pictures';

    public function spati()
    {
        return $this->belongsTo('Spati\Spati');
    }
}
