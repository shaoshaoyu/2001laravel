@foreach($data as $v)
        <tr>
            <td>{{$v->title}}</td>
            <td>{{$v->type_name}}</td>
            <td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="50">@endif</td>
            <td>{{$v->desc}}</td>
            <td>
                <a href="{{url('zuoye/product/'.$v->id)}}">
                    <button type="button" class="btn btn-primary">前往详情页</button>
                </a>
                <a href="{{url('zuoye/form')}}">
                     <button type="button" class="btn btn-primary">添加新闻</button>
                 </a>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5" align="center">{{$data->links()}}</td>
    </tr>