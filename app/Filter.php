<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $table= "filters";
    protected $fillable =['transaction_id','url'];
}
