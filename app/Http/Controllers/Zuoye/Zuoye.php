<?php

namespace App\Http\Controllers\Zuoye;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Login as Lmodel;
use App\Zuoye as Zmodel;
use App\Type as Tmodel;
use Illuminate\Support\Facades\Redis;
class Zuoye extends Controller
{
    public function login(){
        return view('zuoye.login');
    }
    public function logindo(){
        $login_name=request()->login_name;
        $login_pwd=request()->login_pwd;
        //dd($login_pwd);
        $res=Lmodel::where('login_name',$login_name)->first();
        //dd($res);
        if(!$res){
            return redirect('zuoye/login')->with('msg','用户名不存在');die;
        }
        if(decrypt($res['login_pwd'])!=$login_pwd){
            return redirect('zuoye/login')->with('msg','密码错误');die;
        }
        request()->session()->put('user',$res);
        return redirect('zuoye/list');
    }
    //表单
    public function form(){
        $res=Tmodel::all();

        return view('zuoye.form',['res'=>$res]);
    }
    //展示
    public function saves(Request $request){
        $post= request()->except('_token');
        //$post=time();
        //dd($post);
        //文件上传
        if($request->hasFile('img')){
            $post['img']=upload('img');
            
         }
        // dd($post);
         $post['z_time']=time();
         $data=Zmodel::insert($post);
         if($data){
            return redirect('zuoye/list');
         }
    }
    //列表
    public function list(){
        $data=Zmodel::leftjoin('type','zuoye.type_id','=','type.type_id')->paginate(3);
        if(request()->ajax()){
            return view('zuoye.ajax',['data'=>$data]);
        }
        return view('zuoye.list',['data'=>$data]);
    }
    //详情页
    public function product($id){
        
        $res= Zmodel::where('id',$id)->first();
        $user=request()->session()->get('user.login_name');
        $redis=Redis::setnx('count_'.$id,1)?:Redis::incr('count_'.$id);
        return view('zuoye.product',['res'=>$res,'user'=>$user,'redis'=>$redis]);
    }
}
