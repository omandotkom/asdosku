<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $table = "transactions";
    protected $fillable = ['asdos','dosen','activity_id','keterangan','dari','sampai','biaya','status'];
    
}