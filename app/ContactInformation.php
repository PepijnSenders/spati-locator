<?php

namespace Spati;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $table = 'contact_informations';

    public function spati()
    {
        return $this->hasOne('Spati\Spati');
    }
}
