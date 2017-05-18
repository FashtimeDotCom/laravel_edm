<?php
//生成链接相关控制器
namespace App\Http\Controllers\Index;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * 链接列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query=Link::query();
        $link_title=$request->input("link_title");
        if(!empty($link_title)){
            $query->where('link_title','like',"%$link_title%");
        }
        $data=$query->orderBy('id','desc')->paginate(10);
        return view('link.index',compact('data'));
    }

    /**
     * 链接添加页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('link.create');
    }

    /**
     * 链接保存页面
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function story(Request $request,Link $link)
    {
        $this->validate($request,[
            "link_title"=>"required|unique:Link",
            "redirect_url"=>"required|unique:Link"
        ],[
            "required"=>":attribute 必须填写",
            "unique"=>":attribute 重复"
        ],[
            "link_title"=>"标题",
            "redirect_url"=>"跳转链接"
        ]);
        if(!$link->create($request->input())){
            return redirect()->back()->withInput()->withErrors("errors","添加失败");
        }
        return redirect("/link")->with("success","添加成功");
    }
}
