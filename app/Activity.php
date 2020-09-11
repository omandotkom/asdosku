<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Activity extends Model
{
    protected $table = 'activities';
    use SoftDeletes;
   public function service(){
    return $this->hasOne('App\Service', 'id', 'service_id');
   }
}
