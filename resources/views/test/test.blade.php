<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
</head>
<body>

{{ csrf_token() }}
    <h1> Test </h1>
</body>
</html>
<script src="/ueditor/third-party/jquery.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    type:"POST",
    url:"/test",
    data:{title:'abc',content:'bcd'},
    success:function(data){
        console.log( 'ok:' , data );
    },
    error:function(data , data1 , data2) {
        console.log(  data,data1,data2 );
        console.log( 'error:' ,  data.responseJSON.errors );

        for( var i in data.responseJSON.errors) {
            console.log(  i  , data.responseJSON.errors[i])
        }
    }
});
</script>
