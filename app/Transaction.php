<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['asdos','dosen','activity_id','keterangan','dari','sampai','biaya','status'];
    
}