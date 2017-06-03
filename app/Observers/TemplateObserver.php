<?php
/**
 * Created by PhpStorm.
 * User: qiangbi
 * Date: 17-5-31
 * Time: 下午6:21
 */

namespace App\Observers;
use App\Template;
class TemplateObserver
{
    public function creating(Template $template)
    {
        $template->create_time=time();
        $template->update_time=time();
    }

}