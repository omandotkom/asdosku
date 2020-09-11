<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
    protected $table = "spends";

    protected $fillable = ["note","amount","date"];
}
