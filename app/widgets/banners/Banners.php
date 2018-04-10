<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.04.2018
 * Time: 13:50
 */

namespace app\widgets\banners;

use gshop\App;
use gshop\TSingletone;
class Banners
{
    protected $tpl;
    protected $banners;


    public function __construct($banners_group,$type = 'text'){
        $this->banners = self::getBannerList($banners_group);
        $this->tpl = __DIR__. '/banners_tpl/'.$type.'.php';
        echo $this->getHtml();
    }

    public function getBannerList($banners_group){
        return \R::getAssoc("SELECT b.banners_id, b.banners_url, bd.banners_title, bd.banners_image, bd.banners_html 
FROM banners b, banners_description bd 
WHERE active = 1 AND b.banners_id = bd.banners_id AND bd.language_id = ".App::$app->getProperty('language')['languages_id'] . "  AND b.banners_group = '" . $banners_group . "' ORDER BY b.sort_order");
    }

    public function getHtml(){
        ob_start();
        include $this->tpl;
        return ob_get_clean();
    }

}