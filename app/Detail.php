<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'nik', 'kampus','user_id', 'wa', 'kampus_dosen','kampus_id','semester','jurusan_id','alamat','prefer','gender'
     ];
    protected $table = 'details';
    function kampus(){
        return $this->hasOne('App\Campus','id','kampus_id');
    }
    function jurusan(){
        return $this->hasOne('App\Jurusans','id','jurusan_id');
    }
}
