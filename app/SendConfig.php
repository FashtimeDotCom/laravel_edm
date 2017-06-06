<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendConfig extends Model
{
    //表名
    public $table="send_config";
    //时间戳
    public $timestamps=false;

    /**
     *
     * @param $province
     * @return array|bool
     */
    public function getProvinceIdAttribute($province)
    {
        return $this->province($province);
    }

    /**
     * 查询时候使用  域名的所属省市
     * @access public
     */
    public function province($key=null)
    {
        $provincese=[
            '北京' => 'beijing',
            '山东' => 'shandong',
            '河南' => 'henan',
            '山西' => 'shanxi',
            '河北' => 'hebei',
            'CN库1' => 'cn1',
            'CN库2' => 'cn2',
            'CN库3' => 'cn3',
            'CN库4' => 'cn4',
            'CN库5' => 'cn5',
            '广东' => 'guangdong',
            '江苏' => 'jiangsu',
            '浙江' => 'zhejiang',
            '四川' => 'sichuan',
            '湖北' => 'hubei',
            '辽宁' => 'liaoning',
            '湖南' => 'hunan',
            '福建' => 'fujian',
            '上海' => 'shanghai',
            '安徽' => 'anhui',
            '陕西' => 'shanxi2',
            '内蒙古' => 'neimenggu',
            '广西' => 'guangxi',
            '江西' => 'jiangxi',
            '天津' => 'tianjin',
            '重庆' => 'chongqing',
            '黑龙江' => 'heilongjiang',
            '吉林' => 'jilin',
            '云南' => 'yunnan',
            '贵州' => 'guizhou',
            '新疆' => 'xinjiang',
            '甘肃' => 'gansu',
            '海南' => 'hainan',
            '宁夏' => 'ningxia',
            '青海' => 'qinghai',
            '西藏' => 'xizang',
            '香港' => 'hongkong',
            '澳门' => 'aomen',
            '台湾' => 'taiwan',
            '其他' => 'other',
        ];
        $flip_arr=array_flip($provincese);
        if(!empty($key)){
            return array_key_exists($key,$flip_arr)?$flip_arr[$key]:$flip_arr["other"];
        }
        return $flip_arr;
    }

    /**
     * 配置类型
     * @access public
     */
    public function configType()
    {
        $data = [
            ["id" => 'email', "text" => "邮箱地址"],
            ["id" => 'contacttool', "text" => "咨询工具"],
            ["id" => 'website', "text" => "网站"],
        ];
        return $data;
    }

    /**
     * 网站类型
     * @return array
     */
    public function websiteType()
    {
        return [
            ["id" => "all", "text" => "全部"],
            ["id" => "none_website", "text" => "没有网站"],
            ["id" => "have_website", "text" => "有网站"]
        ];
    }
}
