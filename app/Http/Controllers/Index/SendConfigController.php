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
    public function create(SendConfig $sendConfig,ExternalConnect $externalConnect)
    {
        //获取省份
        $province=$sendConfig->province();
        //获取配置类型
        $configType=$sendConfig->configType();
        //获取邮箱品牌
        $brand=$externalConnect->getBrand();
        //网站类型
        $website=$sendConfig->websiteType();
        return view("sendconfig.create",compact('website','province','configType','brand'));
    }

    public function story()
    {

    }
}
