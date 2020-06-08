<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $table = 'archives';
    protected $guarded = []; //tambahkan baris ini
        protected $fillable = ['user_id','image_name','image_path','cv_path','another_file_path','identity','ktm','complete'];
}
