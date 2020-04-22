<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = "bidapplicants";
    protected $fillable = ["bid_id","user_id"];
    public function asdos(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function bid(){
        return $this->hasOne('App\Bid','id','bid_id');
    }
}
