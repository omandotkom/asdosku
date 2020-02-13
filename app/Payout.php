<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $table = "payouts";
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function transaction(){
        return $this->hasOne('App\Transaction','id','transaction_id');
    }
    public function detail(){
        return $this->hasOne('App\Detail','user_id','user_id');
    }
}
