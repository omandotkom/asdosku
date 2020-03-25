<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'username', 'name', 'email','status', 'password', 'role','api_token','subrole' ,'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function detail(){
      //  return $this->hasOne('App\Detail', 'id', 'detail_id');
        return $this->hasOne('App\Detail');
    }
    public function archive(){
        return $this->hasOne('App\Archive');
    }
    public function bank(){
        return $this->hasOne('App\Bank');
    }
   
}
