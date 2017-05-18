<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //表明
    protected $table="link";
    // 取消自动添加时间戳
    public $timestamps=false;
    //允许的字段填充
    protected $fillable=["link_title","link_url","redirect_url","read_num","create_time","update_time"];
}
