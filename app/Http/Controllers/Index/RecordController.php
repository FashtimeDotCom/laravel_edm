<?php

namespace App\Http\Controllers\Index;

use App\Record;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    /**
     * 发送记录列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data=Record::paginate(10);
        return view(record.index,compack('data'));
    }
}
