<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailVerif extends Model
{
    public $timestamps = false;
    protected $table = "emailvers";
    protected $fillable = ['user_id','code'];
}
