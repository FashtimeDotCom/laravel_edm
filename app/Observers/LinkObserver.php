<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-5-17
 * Time: 下午4:27
 */

namespace App\Observers;

use App\Link;
use ClassPreloader\Config;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class LinkObserver
{
    /**
     * 添加数据完成后,再次从模型中获取数据并添加数据后 执行修改
     * @param Link $link
     */
    public function created(Link $link)
    {
        //要跳转的url
        $url=config('basicconfig.emailDomain.domain')."/index/unsubscribeemail/linkjump/link_id/".$link->id."/record_id/{{id}}.html";
        $link->link_url=$url;
        $link->save();
    }

}