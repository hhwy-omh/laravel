<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    public $fillable = ['content','blog_id'];

    // 关联用户表
    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
