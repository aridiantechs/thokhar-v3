<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function reserved_consultations()
    {
        return $this->hasMany('App\Consultations','slot_id');
    }
}
