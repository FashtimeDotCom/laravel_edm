<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalConnect extends Model
{
//    mysql2链接
    protected $connection="mysql2";
    protected $table="mx_brand";

    /**
     * 获取所有品牌
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBrand()
    {
        $data=self::all(["id","name"]);
        $temp=$data->toArray();
        array_unshift($temp, ["id" => 'all', "name" => "全部（带mx+不带mx）"]);
        array_unshift($temp, ["id" => 0, "name" => "未分类品牌"]);
        return $temp;
    }
}
