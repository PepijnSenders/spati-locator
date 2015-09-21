<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Spati extends Model
{
    protected $table = 'spatis';

    const KILOMETERS = 6371;

    public static function closest($latitude, $longitude, $count = 10)
    {
        return self::select('spatis.*', DB::raw(
                '(' . self::KILOMETERS . " * acos(cos(radians($latitude))" .
                "* cos(radians(addresses.latitude)) * cos(radians(addresses.longitude) - radians($longitude)) " .
                "+ sin(radians($latitude)) * sin(radians(addresses.latitude)))) AS distance"
            ))
            ->join('addresses', 'spatis.id', '=', 'addresses.spati_id')
            ->orderBy('distance', 'ASC')
            ->take($count)
            ->get();
    }

    public function address()
    {
        return $this->hasONe('Spati\Address');
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
        return $this->hasONe('Spati\ContactInformation');
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
