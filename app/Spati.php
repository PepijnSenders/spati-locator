<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class Spati extends Model
{
    protected $table = 'spatis';

    public function address()
    {
        return $this->belongsTo('Spati\Address');
    }

    public function alternateOpeningTimes()
    {
        return $this->hasMany('Spati\AlternateOpeningTime');
    }

    public function amenities()
    {
        return $this->hasMany('Spati\Amenity');
    }

    public function contactInformation()
    {
        return $this->belongsTo('Spati\ContactInformation');
    }

    public function openingTimes()
    {
        return $this->hasMany('Spati\OpeningTime');
    }

    public function pictures()
    {
        return $this->hasMany('Spati\Picture');
    }
}
