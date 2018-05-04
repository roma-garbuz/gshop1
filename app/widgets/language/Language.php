<?php

namespace app\widgets\language;
use gshop\App;
use gshop\TSingletone;
class Language
{
    protected $tpl;
    protected $languages;
    protected $language;

    public function __construct()
    {
        $this->tpl = __DIR__. '/language_tpl/language.php';
        $this->run();
    }

    public function run(){
        $this->languages = App::$app->getProperty('languages');
        $this->language = App::$app->getProperty('language');
        echo $this->getHtml();
    }

    public static function getLanguages(){
        return \R::getAssoc("SELECT code, languages_id, name, base FROM languages WHERE  active = 1 ORDER BY base DESC");
    }

    public static function getLanguage($languages){
        if(isset($_COOKIE['language']) && array_key_exists($_COOKIE['language'], $languages)){
            $key = $_COOKIE['language'];
        } else {
            $key = key($languages);
        }
        $language = $languages[$key];
        $language['code'] = $key;
        return $language;
    }

    public function getHtml(){
        ob_start();
        include $this->tpl;
        return ob_get_clean();
    }

}