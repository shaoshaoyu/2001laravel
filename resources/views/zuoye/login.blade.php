<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{session('msg')}}
    <form action="{{url('zuoye/logindo')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="login_name"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="login_pwd"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>