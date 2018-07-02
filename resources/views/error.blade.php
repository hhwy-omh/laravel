<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<h1>出错了！</h1>

@if($errors->any())

<ul>
    @foreach($errors->all() as $e)

    <li>{{$e}}</li>

    @endforeach

</ul>

@endif

</body>
</html>
