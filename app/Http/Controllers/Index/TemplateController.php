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

    /**
     * 修改页面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Template $template,$id)
    {
        $data=Template::find($id);
        $type=$template->getType();
        $link=Link::all(["link_title as text","link_url"]);
        return view('template.edit',compact('data','type','link'));
    }

    /**
     * 修改操作
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $rule=[
            "title"=>"required",
            "type"=>"required",
            "detail"=>"required",
            "content"=>"required"
        ];
        $message=[
            "title.required"=>"标题必须填写",
            "type.required"=>"请选择类型",
            "detail.required"=>"描述必须填写",
            "content.required"=>"内容必须填写"
        ];
        $validator=Validator::make($request->input(),$rule,$message);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $template=Template::find($id);
        $template->fill($request->input());
        if(!$template->save()){
            return redirect()->back()->with("error","修改失败!!");
        }
        return redirect('template')->with("success","修改成功!!");
    }
}
