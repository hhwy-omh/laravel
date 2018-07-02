<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Blog extends Model
{
    // 允许被填充的字段
    protected $fillable = ['title','content','accessable'];


    // 关联用户 - 关联user
    public function user() {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public static function top10() {

        return Cache::remember('top10', 5, function(){

            return Blog::select('id','title','created_at')
                ->where('accessable','public')
                ->orderBy('score','desc')
                ->take(10)
                ->get();

        });
    }

    // 获取最新的带翻页的数据
    public static function newBlogs() {
        return Blog::where('accessable','public')
            ->orderBy('id','desc')
            ->with('user')
            ->paginate(8);
    }

    // 浏览并且+1
    public static function viewAndAddDisplay($id) {
        $blog = Blog::find($id);
        $blog->increment('display');
        return $blog;
    }

}
