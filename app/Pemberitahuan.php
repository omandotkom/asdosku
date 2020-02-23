<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    protected $table = "notifications";
    protected $guarded = ['id'];
}
