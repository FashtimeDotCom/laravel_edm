<?php
//首页相关的控制器
namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 首页html
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $manager=($request->user()?$request->user()->name:"");
        return view('index.index',compact("manager"));
    }
}
