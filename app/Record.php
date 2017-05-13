<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class Record extends Model
{
    protected $table = "send_record";

    /**
     * template_type的访问器
     * @param $templateType
     * @return array|mixed|string
     */
    public function getTemplateTypeAttribute($templateType)
    {
        return $this->getTemplateType($templateType);
    }

    /**
     * 查询时候使用  域名的所属省市
     * @access public
     */
    public function province()
    {
        return [
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
    }

    /**
     * 获取邮件模板类型
     * @access public
     */
    public function getTemplateType($id=null)
    {
        $types= [
            '10' => '邮箱',
            '20' => '有道',
            '30' => '七鱼',
            '40' => '域名',
            '50' => '其他'
        ];
        if(!empty($id)){
            return array_key_exists($id,$types) ? $types[$id]:"其他";
        }
        return $types;
    }

}
