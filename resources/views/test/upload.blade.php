<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<img width="150" src="{{ Storage::url('face/20180515/k7aoooWHVpcfDaULrvFS16n07gbMqMcoU7kAAh8S.jpeg')  }}" alt="">

<form enctype="multipart/form-data" method="POST" action="{{ route('test.doupload')}}">

    {{ csrf_field() }}
    图片：<input type="file" name="logo">

    <input type="submit" value="提交">

</form>
</body>
</html>
