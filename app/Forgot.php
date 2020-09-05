<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forgot extends Model
{
    use SoftDeletes;
    protected $table = "forgot_password_tokens";
    protected $fillable = ["email","token","link"];
}
