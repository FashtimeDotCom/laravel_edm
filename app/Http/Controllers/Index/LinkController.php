<?php

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
    public function index()
    {
        $data=Link::paginate(10);
        return view('link.index',compact('data'));
    }
}
