<?php

namespace App\Http\Controllers\Index;

use App\Link;
use App\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $link=Link::all(["id","link_title as text"]);
        return view("template.create",compact('type','link'));
    }

    public function story()
    {

    }
}
