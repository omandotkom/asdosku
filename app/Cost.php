<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table="costs";
    protected $fillable = ['transaction_id','nominal','keterangan','filepath'];
}
