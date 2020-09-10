<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/static/admin/layui/css/layui.css">
  <script src="/static/jquery.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">品牌管理</a>
          <dl class="layui-nav-child">
            <dd><a href="{{url('brand/create')}}">品牌添加</a></dd>
            <dd><a href="{{url('brand/index')}}">品牌列表</a></dd>
            
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd><a href="javascript:;">商品添加</a></dd>
            <dd><a href="javascript:;">商品列表</a></dd>
            
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
        <span class="layui-breadcrumb" style="padding: 15px;">
        <a href="/">首页</a>
        <a href="/demo/">品牌管理</a>
        <a><cite>品牌列表</cite></a>
        </span>
        
    </fieldset>
   
    <table class="layui-table">
      <colgroup>
        <col width="150">
        <col width="150">
        <col width="200">
        <col>
      </colgroup>
      <!-- 搜索 -->
      <form action="{{url('brand/index')}}">
      <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">品牌名称</label>
          <div class="layui-input-inline">
            <input type="tel" name="brand_name" lay-verify="required|phone" autocomplete="off" class="layui-input" value="{{$query['brand_name']??''}}">
          </div>
          <div class="layui-inline">
            <label class="layui-form-label">品牌网址</label>
            <div class="layui-input-inline">
              <input type="tel" name="brand_url" lay-verify="required|phone" autocomplete="off" class="layui-input" value="{{$query['brand_url']??''}}">
            </div>
          </div>
          <button type="submit" class="layui-btn layui-btn-danger del">搜索</button>
        </form>

        <a style="font-size: 15px;" id="but" type="button" class="btn btn-primary"><button type="button" class="layui-btn ">批量删除</button></a>
      <thead>
        <tr>
          <td><input type="checkbox" id="allbox" class="ds">全选</td>
          <th>ID</th>
          <th>品牌名称</th>
          <th>品牌LOG</th>
          <th>品牌网址</th>
          <th>品牌简介</th>
          <th>操作</th>
        </tr> 
      </thead>
     
<tbody>
      @foreach($data as $v)
      
        <tr brand_id="{{$v->brand_id}}">
          <!-- <td> {{$v->brand_id}} </td> -->
          <td >
            <input type="checkbox" name="box[]" value="{{$v->brand_id}}" class="box"/> 
          </td> 
          <td >
           {{$v->brand_id}}
          </td> 
          <td field="brand_name">
            <span class="span_test">{{$v->brand_name}}</span>
						<input type="text" class="changeValue" value="{{$v->brand_name}}" style="display:none;">
          </td>
          
          <td>@if($v->brand_log)<img src="{{$v->brand_log}}" width="50">@endif</td>
          <td field="brand_url">
            <span class="span_test">{{$v->brand_url}}</span>
            <input type="text" class="changeValue" value="{{$v->brand_url}}" style="display:none;">
          </td>
          <td>{{$v->brand_desc}}</td>
          <td>
            <a href="{{url('brand/edit/'.$v->brand_id)}}"><button type="button" class="layui-btn ">编辑</button></a>
            <button type="button" class="layui-btn layui-btn-danger del" brand_id="{{$v->brand_id}}"><i class="layui-icon"></i></button>

            
            
          </td>
        </tr>
       @endforeach
      <tr ><td colspan="7">{{$data->appends($query)->links('vendor/pagination/shop')}}</td></tr>
</tbody>
      
        
       
    </table>
    
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script>
//JavaScript代码区域

layui.use(['element','form'], function(){
  var element = layui.element;
  var form = layui.form;
});
  //即点击改
  $(document).on('click','.span_test',function(){
  
  //alert(123);
			var _this=$(this);
			_this.hide();
			_this.next("input").show();
		})
    //绑定失焦
    $(document).on('blur','.changeValue',function(){
			//获取对象
			var _this=layui.$(this);
			//获取新值
			var val=_this.val();
      if(!val){
        alert('不能为空');
      }
      //alert(val);
			//获取字段
			var field=_this.parent().attr("field");
      //alert(field);
			//获取id
			var brand_id=_this.parents("tr").attr("brand_id");
			//console.log(brand_id);
      layui.$.post(
				"{{url('brand/brand_name')}}",
				{val:val,field:field,brand_id:brand_id},

				function(res){
          //alert(res);
					if(res==0){
						_this.prev("span").text(val).show();
						_this.hide();
						}else{
							alert("无法操作");
						}
					
				}
			);

    })
    //删除
    $(document).on('click','.del',function(){
    
      //alert(1223);
      var brand_id=$(this).attr('brand_id');
      var obj=$(this);
      //alert(obj);
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
      if(confirm('确定删除吗?')){
         $.post('destroy/'+brand_id,function(res){
            if(res.code='0000'){
                location.reload();
            }
        },'json');
      }
     

    })
    //ajax分页
    $(document).on('click','.layui-laypage a',function(){
      var url=$(this).attr('href');
      //alert(url);
      $.get(url,function(res){
            $('tbody').html(res);
            $('.ds').prop('checked',false);
            layui.use(['element','form'], function(){
            var element = layui.element;
            var form = layui.form;
            })
        });
      return false;
    })
    //全选
    $(document).on('click','#allbox',function(){
      //alert(123);
      var check=$('#allbox').prop('checked');
      //alert(check);
      if(check){
        $('.box').prop('checked',true);
      }else{
        $('.box').prop('checked',false);
      }
    })
    //批量删除
    $(document).on('click','#but',function(){
      //alert(123);
      //var  box = $("input[name='box']");
      var ids=new Array();
     $('input[name="box[]"]:checked').each(function(i,k){
      ids.push($(this).val());
     })
     $.ajaxSetup({ headers: {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
    //  if(confirm('确定删除吗?')){
          $.post('news_ajax',{id:ids},function(res){
            //alert(res);
                      if(res.code='0'){
                        alert(res.msg);
                          location.reload();
                      }
                  },'json');
    //  }
     
     
     
     
    })
    


</script>
</body>
</html>