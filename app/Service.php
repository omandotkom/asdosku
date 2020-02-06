<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    public $incrementing = false;
    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
}
