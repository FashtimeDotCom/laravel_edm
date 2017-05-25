<?php

namespace App\Http\Controllers\Index;

use App\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    public function index(Template $template)
    {
        $data=$template::orderBy("id","desc")->paginate();
        return view('template.index',compact('data'));
    }
}
