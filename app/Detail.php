<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'nik', 'kampus','user_id', 'wa', 'semester', 'jurusan','alamat','prefer','gender'
     ];
    protected $table = 'details';
}
