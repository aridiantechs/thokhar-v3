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

    public function duplicate_slot_locate()
    {
        $slot_ids=explode(",",$this->slots);
        $dups = array();
        foreach(array_count_values($slot_ids) as $val => $c){
            if($c > 1) $dups[$val] = $c-1;
        }

        $data = collect();
        foreach ($dups as $key => $value) {
            for ($i=0; $i < $value; $i++) { 
                $slot=Slot::where('id',$key)->first();
                if ($slot) {
                     $data->push($slot);
                }
            }
           
        }
        
        /* dd($data); */
        return $data;
        //return $this->belongsTo('App\Sku','sku_id');
    }

    public function reserved_consultations()
    {
        return $this->hasMany('App\Consultations','working_hour_id');
    }

    public function available_slots()
    {
        $consultations=$this->reserved_consultations->pluck('slot_id');
        $slot_ids=explode(",",$this->slots);

        $data=Slot::whereIn('id',$slot_ids)->whereNotIn('id',$consultations)->get();
        return $data;
    }

    public function available_slots_new()
    {
        $consultations=$this->reserved_consultations->pluck('slot_id')->toArray();
        $slot_ids=explode(",",$this->slots);
        $dup_slot = array();
        $dup_cons = array();

        foreach(array_count_values($slot_ids) as $val => $c){
             $dup_slot[$val] = $c;
        }

        foreach(array_count_values($consultations) as $val => $c){
             $dup_cons[$val] = $c;
        }

        $result=array_diff_assoc($dup_slot,$dup_cons);
        // dd($dup_slot,$dup_cons);

        $data = collect();
        foreach ($result as $key => $value) {
            $slot=Slot::where('id',$key)->first();
            if ($slot) {
                $data->push($slot);
            }
        }

        if (auth()->user()->consultation && auth()->user()->consultation->status =='CANCELLED') {
            $slot=Slot::where('id',auth()->user()->consultation->slot_id)->first();
            if ($slot) {
                $data->push($slot);
            }
        }
        // dd($data);
        return $data;
    }
}
