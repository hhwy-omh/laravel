@extends('layouts.main')

@section('title','日志列表')

@section('content')

<style>
input[type=text] {
    width: 180px;
}
</style>

<div class="container">
    <h1>我的日志
		<a href="{{ route('blog.add') }}">写日志</a>
		<a href="">删除选中日志</a>
    </h1>
    <br>
    <form>
        关键字：
        <input type="text" name="keyword" value="{{ $req->keyword }}">
        添加时间 ：
        从 <input type="text" name="from" value="{{ $req->from }}"> 到
        <input type="text" name="to" value="{{ $req->to }}">
        访问权限：
        <input type="radio" name="acc" value=""> 全部
        <input type="radio" name="acc" value="public" @if($req->acc=='public') checked @endif> 公开
        <input type="radio" name="acc" value="protected" @if($req->acc=='protected') checked @endif> 好友可见
        <input type="radio" name="acc" value="private" @if($req->acc=='private') checked @endif> 私有
        <input type="submit" value="搜索">
    </form>
    <table class="data-list">
        <tr>
            <th>ID</th>
            <th>logo</th>
            <th>标题</th>
            <th>添加时间
                @if($req->od=='asc')
                <a href="{{  route('blog.list',  array_merge(  $req->all() ,  ['od'=>'desc']    )  )  }}" > ⬇ </a>
                @else
                <a href="{{  route('blog.list',  array_merge(  $req->all() ,  ['od'=>'asc']      )  )  }}" > ⬆ </a>
                @endif
            </th>
            <th>修改时间</th>
            <th>访问权限</th>
            <th>操作</th>
        </tr>
        @foreach($blogs as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>
                    @if($v->logo)
                        <img width="70" src="{{ Storage::url( $v->logo ) }}">
                    @endif
                </td>
                <td>{{$v->title}}</td>
                <td>{{$v->created_at}}</td>
                <td>{{$v->updated_at}}</td>
                <td>{{ $v->accessable }}</td>
                <td class="btn">
                    <a href="{{ route('blog.edit' , ['id'=>$v->id]) }}">修改</a>
                    <a onclick="return confirm('确定要删除吗？');" href="{{ route('blog.delete' , ['id' => $v->id]) }}">删除</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="7"> {{ $blogs->appends( $req->all() )->links() }} </td>
        </tr>
    </table>
</div>

@endsection
