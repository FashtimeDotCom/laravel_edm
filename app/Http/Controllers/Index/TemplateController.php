<?php

namespace App\Http\Controllers\Index;

use App\Link;
use App\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    /**
     * 模板列表页
     * @param Template $template
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Template $template)
    {
        $data=Template::orderBy("id","desc")->paginate();
        return view('template.index',compact('data'));
    }

    /**
     * 添加页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Template $template)
    {
        $type=$template->getType();
        $link=Link::all(["link_title as text","link_url"]);
        return view("template.create",compact('type','link'));
    }

    /**
     * 添加操作
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function story(Request $request,Template $template)
    {
        $rule=[
            "title"=>"required|unique:template",
            "type"=>"required",
            "detail"=>"required",
            "content"=>"required"
        ];
        $message=[
            "title.required"=>"请填写标题",
            "type.required"=>"请选择类型",
            "detail.required"=>"请填写描述",
            "content.required"=>"请填写内容"
        ];
        $validate=Validator::make($request->input(),$rule,$message);
        if($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate);
        }
        if(!$template->create($request->input())){
            return redirect()->with("error","添加失败");
        }
        return redirect('template')->with("success","添加成功!");
    }
}
