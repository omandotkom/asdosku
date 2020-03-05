<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "bankaccounts";
    
    protected $fillable = ['user_id','nama','payment','nomor'];
}
