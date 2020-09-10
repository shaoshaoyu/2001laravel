<?php
     //封装文件
   function upload($filename){
    $file=request()->file($filename);
    
    if($file->isValid()){
        $path=$file->store('upload');
        //dump($path);exit;
        return $path;
    }

    exit('文件上传错误');
}


?>