<?php

namespace App\Http\Controllers\Index;

use App\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller
{
    /**
     * 发送记录列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Record $record,Request $request)
    {
        $title=$request->input("title");
        //条件判断式的where查询
        $query=Record::query();
        if(!empty($title)){
            $query->where('wwwtitle','like',"%$title%");
        }
        $data=$query->paginate(10);
        return view('record.index',compact('data'));
    }
}
