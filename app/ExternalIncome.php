<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalIncome extends Model
{
    
    protected $table = "external_income";

    protected $fillable = ["note","amount","date"];
}
