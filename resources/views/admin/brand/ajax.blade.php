@foreach($data as $v)
      
        <tr brand_id="{{$v->brand_id}}">
          <!-- <td> {{$v->brand_id}} </td> -->
          <td ><input type="checkbox" name="box[]" value="{{$v->brand_id}}" class="box"/></td> 
          <td> {{$v->brand_id}}</td> 
          <td field="brand_name">
            <span class="span_test">{{$v->brand_name}}</span>
						<input type="text" class="changeValue" value="{{$v->brand_name}}" style="display:none;">
          </td>
          
          <td>@if($v->brand_log)<img src="{{$v->brand_log}}" width="50">@endif</td>
          <td>{{$v->brand_url}}</td>
          <td>{{$v->brand_desc}}</td>
          <td>
            <a href="{{url('brand/edit/'.$v->brand_id)}}"><button type="button" class="layui-btn ">编辑</button></a>
            <button type="button" class="layui-btn layui-btn-danger del" brand_id="{{$v->brand_id}}"><i class="layui-icon"></i></button>
            
          </td>
        </tr>
       @endforeach
       
      
      <tr ><td colspan="7">{{$data->appends($query)->links('vendor/pagination/shop')}}</td></tr>
      <script src="/static/jquery.js"></script>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <script>
         $(document).on('click','#but',function(){
      //alert(123);
      //var  box = $("input[name='box']");
      var ids=new Array();
     $('input[name="box[]"]:checked').each(function(i,k){
      ids.push($(this).val());
     })
     $.ajaxSetup({ headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
     $.post('news_ajax',{id:ids},function(res){
            if(res.code='0000'){
                location.reload();
            }
        },'json');
    })

    // //批量删除
    // $(document).on('click','#but',function(){
    //   //alert(123);
    //   //var  box = $("input[name='box']");
    //   var ids=new Array();
    //  $('input[name="box[]"]:checked').each(function(i,k){
    //   ids.push($(this).val());
    //  })
    //  $.ajaxSetup({ headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    //  $.post('news_ajax',{id:ids},function(res){
    //         if(res.code='0000'){
    //             location.reload();
    //         }
    //     },'json');
     
     
     
    // })
      </script>