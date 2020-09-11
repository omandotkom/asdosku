<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = "discounts";
    protected $fillable = ['id','code','discount','from','to','status'];
    public $incrementing = false;
}
