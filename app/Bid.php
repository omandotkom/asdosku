<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = "bids";
    protected $fillable = ['service_id', 'activity_id', 'transaction_id', 'dari', 'sampai', 'datemax', 'keterangan', 'status', 'quantity'];
    public function activity()
    {
        return $this->hasOne('App\Activity', 'id', 'activity_id');
    }
    public function service(){
        return $this->hasOne('App\Service','id','service_id');
    }
    public function creator(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function applicants(){
        return $this->hasMany('App\Applicant','bid_id','id');
    }

}
