<?php
//生成链接相关控制器
namespace App\Http\Controllers\Index;

use App\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    /**
     * 链接列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Link::query();
        $link_title = $request->input("link_title");
        if (!empty($link_title)) {
            $query->where('link_title', 'like', "%$link_title%");
        }
        $data = $query->orderBy('id', 'desc')->paginate(10);
        return view('link.index', compact('data'));
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
    public function story(Request $request, Link $link)
    {
        $rule = [
            "link_title" => "required|unique:Link",
            "redirect_url" => "required|unique:Link"
        ];
        $message = [
            "link_title.required" => "请填写标题",
            "redirect_url.required" => "请填写跳转链接",
            "link_title.unique" => "标题不能重复",
            "redirect_url.unique" => "链接地址不能重复",
        ];
        $validator = Validator::make($request->input(), $rule, $message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        if (!$link->create($request->input())) {
            return redirect()->with("error", "添加失败");
        }
        return redirect("/link")->with("success", "添加成功");
    }

    /**
     * 修改页面
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $data = Link::find($id);
        return view("link.edit",compact('data'));
    }

    /**
     * 修改操作
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function update(Request $request,$id)
    {
        $rule=[
            "link_title" =>"required|unique:link,link_title,".$id,
            "redirect_url" => "required|unique:Link,redirect_url,".$id
        ];
        $message=[
            "link_title.required"=>"请填写链接标题",
            "link_title.unique"=>"链接标题重复",
            "redirect_url.required"=>"请填写链接地址",
            "redirect_url.unique"=>"链接地址重复"
        ];
        $validator=Validator::make($request->input(),$rule,$message);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $link=Link::find($id);
        $link->fill($request->input());
        if(!$link->save()){
            return redirect('/link')->with("error","修改失败!");
        }
        return redirect('/link')->with("success","修改成功!");
    }
}
