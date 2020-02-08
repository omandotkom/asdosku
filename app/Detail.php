<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'nik', 'kampus','user_id', 'wa', 'kampus_dosen','kampus_id','semester', 'jurusan','alamat','prefer','gender'
     ];
    protected $table = 'details';
    function kampus(){
        return $this->hasOne('App\Campus','id','kampus_id');
    }
}
