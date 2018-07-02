<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Ding;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    //
    public function add() {
        return view('blog.add');
    }
    public function doadd(BlogRequest $req) {

        // 获取表单中所有的数据
        $data = $req->all();

        // 创建一个空的模型
        $blog = new Blog;

        // 表单中数据设置上
        $blog->fill( $data );

        // 把user_id设置到模型上
        $blog->user_id = session('id');

        // 如果图片是否上传成功
        if($req->has('logo') && $req->logo->isValid()) {

            $validator = Validator::make($req->all(), [
                'logo'=>'image|max:2048',
            ]);

            if(!$validator->fails())
            {
                $date = date('Ymd');

                // 把图片保存到public/uploads/blog/$date下，返回路径的字符串
                $logo = $req->logo->store( 'blog/'.$date );
//                return Storage::url($logo);
                // 把logo也设置到模型上
                $blog->logo = $logo;
            }
            else
            {
                return redirect()->route('blog.list');
            }

        }

        // 设置分值字段
        $blog->score = time();

        // 把模型上的数据保存到表中
        $blog->save();

        return redirect()->route('blog.list');

    }
    public function list(Request $req) {

        // 我是谁？
        $userid = session('id');


        /**************** 一、、先创建一个日志对象，并设置了一个user_id的条件 (((((((((((*/
        // 只取自己的日志
        // 1.  select * from blogs where user_id=xxx
        $data = Blog::where('user_id',$userid);   // 获取一个日志对象
        // 如果是否有关键字
        if( $req->keyword )
        {
            $data->where(  function($q) use ($req) {
                $q->where('title','like',"%$req->keyword%")
                    ->orWhere('content','like',"%$req->keyword%");

            });
        }
        // 是否有开始时间
        if( $req->from )
        {
            $data->where('created_at','>=',$req->from);
        }
        // 是否有结束时间
        if( $req->to )
        {
            $data->where('created_at','<=',$req->to);
        }
        // 访问权限
        if( $req->acc )
        {
            $data->where('accessable',$req->acc);
        }


        /***** 排序 */


        $data->orderBy('created_at',$req->od);


        $data = $data->paginate(20);

        // 显示页面，并把数据传到页面中
        return view('blog.list', [
            'blogs'=>$data,
            'req' => $req,
        ]);

    }
    public function delete($id) {

        // 根据ID取出日志的图片路径

        $blog = Blog::find( $id );

        // 从硬盘上删除图片
        Storage::delete(  $blog->logo  );

        // 从数据库删除日志记录
        $blog->delete();

        // 或者用这个删除（从数据库中删除数据）
        //Blog::destroy($id);

        // 跳转
        return redirect()->route('blog.list');

    }
    public function edit($id) {

        // 根据ID取出这条记录的信息
        $blog = Blog::find($id);  // select * from blog where id = $id

        // 如果不是当前登录用户的日志就跳转
        if($blog->user_id != session('id'))
        {
            return back();
        }


        // 显示表单并把信息传到表单中
        return view('blog.edit', [
            'blog' => $blog,
        ]);

    }

    // 处理修改的表单
    public function doedit(BlogRequest $req, $id) {

        // 先根据ID取出要修改的数据
        $blog = Blog::find($id);

        // 如果不是当前登录用户的日志就跳转
        if($blog->user_id != session('id'))
        {
            return back();
        }

        // 把表单中的数据设置到这个对象上
        $blog->fill( $req->all() );

        // 上传新图片
        if( $req->has('logo')  && $req->logo->isValid() )
        {
            $date = date('Ymd'); // 获取今天的日期
            // 保存到 public/uploads /   blog/当前日期
            $newlogo = $req->logo->store(  'blog/'.$date  );  // 保存到 二级目录  blog/20191919

            // 删除原图片
            Storage::delete(  $blog->logo  );
            // 设置新图片到 blog

            $blog->logo = $newlogo;

        }

        // 保存到表中
        $blog->save();

        // 跳转
        return redirect()->route('blog.list');

    }
}
