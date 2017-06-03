<?php

namespace App\Http\Controllers\Index;

use App\SendConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendConfigController extends Controller
{
    /**
     * 发送配置首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data=SendConfig::orderBy("id","desc")->paginate();
        return view("sendconfig.index",compact('data'));
    }
}
