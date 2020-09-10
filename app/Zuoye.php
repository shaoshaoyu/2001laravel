<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zuoye extends Model
{
    protected $table='zuoye';
    protected $primaryKey='id';
    public $timestamps=false;
    //黑名单
    protected $guarded=[];
}
