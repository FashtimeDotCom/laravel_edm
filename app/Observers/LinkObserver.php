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

class LinkObserver
{
    public function creating(Link $link)
    {
        echo url("subscription/linkjump");die;

//        $link_url= urldecode(config('basicconfig.emailDomain.domain').Url::build("Unsubscribeemail/linkJump","link_id=".$link->id."&record_id={{id}}"));

        dd($link);die;
        dd(config('basicconfig.emailDomain.domain'));die;
    }

}