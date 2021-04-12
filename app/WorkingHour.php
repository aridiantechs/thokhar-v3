<?php

namespace App;

use App\Slot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkingHour extends Model
{
    use SoftDeletes;

    public function slot_locate()
    {
        $slot_ids=explode(",",$this->slots);
        $data=Slot::whereIn('id',$slot_ids)
        ->get();
        return $data;
        //return $this->belongsTo('App\Sku','sku_id');
    }
}
