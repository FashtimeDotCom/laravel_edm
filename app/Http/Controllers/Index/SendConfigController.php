<?php

namespace App\Http\Controllers\Index;

use App\ExternalConnect;
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

    /**
     * 创建页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(SendConfig $sendConfig)
    {
        (new ExternalConnect)->index();
        $province=$sendConfig->province();
        $configType=$sendConfig->configType();
        return view("sendconfig.create",compact('province','configType'));
    }

    public function story()
    {

    }
}
