<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['title', 'user_id', 'transac_id', 'transaction_details'];
}
