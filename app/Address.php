<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    public function spati()
    {
        return $this->hasOne('Spati\Spati');
    }
}
