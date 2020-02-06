<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefer extends Model
{
    protected $table = "prefers";
    protected $fillable = ['user_id','activity_id'];
}
