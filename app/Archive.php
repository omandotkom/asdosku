<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archives';
    protected $guarded = []; //tambahkan baris ini
}
