<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalConnect extends Model
{
    protected $connection="mysql2";
    protected $table="mx_brand";

    public function index()
    {
        $data=self::all();
//        dd($data);die;
        foreach($data as $item){
            dd($item);die;
        }
        die;
    }
}
