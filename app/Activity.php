<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
   public function service(){
    return $this->hasOne('App\Service', 'id', 'service_id');
   }
}
