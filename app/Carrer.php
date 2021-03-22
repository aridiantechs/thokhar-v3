<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{
    protected $table="careers";
    protected $fillable=[
        'name',
        'email',
        'phone',
        'file',
    ];
}
