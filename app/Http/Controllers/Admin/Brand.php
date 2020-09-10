<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand as Bmodel;
use App\Http\Requests\StoreBlogPost;
class Brand extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //搜索
        $brand_name = request()->brand_name;
        $brand_url = request()->brand_url;
        $where=[];
        if($brand_name){
            $where[]=['brand_name','like',"%$brand_name%"];
        }
        if($brand_url){
            $where[]=['brand_url','like',"%$brand_url%"];
        }
        $data=Bmodel::where($where)->orderBy('brand_id','desc')->paginate(10);
        if(request()->ajax()){
            return view('admin.brand.ajax',['data'=>$data,'query'=>request()->all()]);
        }
        return view('admin.brand.index',['data'=>$data,'query'=>request()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        //验证
        //$validated = $request->validated();
        //接值 去token
        $post= $request->except('_token');
        //dd($post);
        if($request->hasFile('brand_log')){
            $post['brand_log']=upload('brand_log');
         }
         $res=Bmodel::insert($post);
         if($res){
            return redirect('brand/index');
         }
    }

    public function upload(Request $request)
    {
        
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file;
            $res=$file->store('upload');
            //return json_encode(['code'=>0,'msg'=>'上传成功','data'=>env('UPLOADS_URL').$res]);
            return $this->success('上传成功',env('UPLOADS_URL').$res);
        }
        //return json_encode(['code'=>2,'msg'=>'上传失败']);
        return $this->error('上传失败');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Bmodel::where('brand_id',$id)->first();
        //dd($brand);
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, $id)
    {
        $post= $request->except('_token');
        //dd($post);
        // if($request->hasFile('brand_log')){
        //     $post['brand_log']=upload('brand_log');
        //  }
         $res=Bmodel::where('brand_id',$id)->update($post);
         if($res!==false){
            return redirect('brand/index');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $res=Bmodel::destroy($id);
        if($res){
            if(request()->ajax()){
                //return json_encode(['code'=>'00000','msg'=>'删除成功']);
                return $this->success('删除成功');
            }
            return redirect('brand/index');
        }
    }
    //即点击改
    public function brand_name(Request $request)
    {
            $val=$request->val;
			$field=$request->field;
			$brand_id=$request->brand_id;
			//实例化
			
			$res=Bmodel::where("brand_id",$brand_id)->update([$field=>$val]);
			if($res==false){
				echo 0;
			}else{
				echo "no";
			}
    }
    //全选,批量删除
    public function news_ajax($id=0)
    {
        $id= request()->id;
        if(!$id){
            return;
        }
        $res=Bmodel::destroy($id);
        if($res){
            if(request()->ajax()){
                 //return json_encode(['code'=>'00000','msg'=>'删除成功']);
                return $this->success('删除成功');
            }
            return redirect('brand/index');
        }

    }
}
