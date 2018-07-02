<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Cache;

class User extends Model
{
    // 设置一个白名单
    protected $fillable = ['mobile','password'];

    // 活跃用户
    public static function acUsers() {

        return Cache::remember('acUsers', 60, function(){

            return Blog::select('user_id')
                ->where('created_at','>=',DB::raw('NOW() - INTERVAL 24 HOUR'))
                ->where('accessable','public')
                ->groupBy('user_id')
                ->orderBy(DB::raw('COUNT(*)'),'desc')
                ->take(9)
                ->with('user')
                ->get();
        });

    }
}
