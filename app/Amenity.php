<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $table = 'amenities';

    public function spati()
    {
        return $this->belongsTo('Spati\Spati');
    }
}
