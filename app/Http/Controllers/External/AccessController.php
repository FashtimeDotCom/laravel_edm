<?php
//用于外界访问的控制器 取消订阅等 可直接操作的
namespace App\Http\Controllers\External;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function linkJump($link_id,$record_id)
    {
        dd($link_id,$record_id);die;
    }
}
