<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    作者:{{$user}}|时间:{{date("Y-m-d H:i:s",$res->z_time)}}|访问量:{{$redis}}
    <br>
    主题内容:{{$res->desc}}
</body>
</html>