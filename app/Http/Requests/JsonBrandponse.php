<?php
    namespace App\Http\Requests;
    //命名空间主要解决函数,类,常亮是同名的问题

trait JsonBrandponse{

    public function error($msg,$data=[]){
        return $this->JsonBrandponse(-1,$msg,$data);
    }


    public function success($msg,$data=[]){
        return $this->JsonBrandponse(0,$msg,$data);
    }

    public function JsonBrandponse($code,$msg,$data=[]){
        $data = [
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data,
        ];
        return response()->json($data);
    }

}?>