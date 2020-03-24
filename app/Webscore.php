<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webscore extends Model
{
    protected $table ="webscores";
    protected $fillable = ['user_id','level'];
}
