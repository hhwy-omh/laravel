<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['created_at','updated_at','user','mobile','password','face','email'];
}
