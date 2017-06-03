<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
     * 设置表名
     * @var string
     */
    protected $table="template";
//    允许填充的字段
    protected $fillable=["title","type","detail","content"];
    // 不使用自定义时间错
    public $timestamps=false;

    /**
     * 获取type属性
     * @param $type
     * @return string
     */
//    public function getTypeAttribute($type)
//    {
//        $temp="未知";
//        switch($type){
//            case 10:
//                $temp="邮箱";
//                break;
//            case 20:
//                $temp="有道";
//                break;
//        }
//        return $temp;
//    }

    /**
     * 获取模板分类
     * @return array
     */
    public function getType($id=null)
    {
        $types= [
            ["id"=>10,"text" => '邮箱'],
            ["id"=>20,"text" => '有道'],
            ["id"=>30,"text" => '七鱼'],
            ["id"=>40,"text" => '域名'],
            ["id"=>50,"text" => '其他']
        ];
        if(!empty($id)){
            return array_key_exists($id,$types) ? $types[$id]:"其他";
        }
        return $types;
    }
}
