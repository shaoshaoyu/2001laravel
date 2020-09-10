<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('zuoye/saves')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>新闻表题</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>新闻分类</td>
                <td>
                    <select name="type_id" id="">
                        <option value="">请选择</option>
                        @foreach($res as $v)
                        <option value="{{$v->type_id}}">{{$v->type_name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>新闻图片</td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td>新闻简介</td>
                <td><textarea name="desc" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>新闻作者</td>
                <td><input type="text" name="zuozhe"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>