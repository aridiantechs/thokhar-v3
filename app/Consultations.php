<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultations extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function working_hour()
    {
        return $this->belongsTo('App\WorkingHour','working_hour_id');
    }

    public function slot()
    {
        return $this->belongsTo('App\Slot','slot_id');
    }

    public function assigned_to()
    {
        return $this->belongsTo('App\User','assign_id');
    }
}
