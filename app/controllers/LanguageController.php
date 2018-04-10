<?php

namespace app\controllers;

use app\widgets\language\Language;
use gshop\App;
class LanguageController extends AppController
{
    public function changeAction(){
        $language = !empty($_GET['lng']) ? $_GET['lng'] : null;

        if($language){
            $lng = App::$app->getProperty("language");
            $lng[$language]['code'] = $language;
            if(!empty($lng[$language]['code'])){
                setcookie('language', $lng[$language]['code'], time()+3600*24*7, '/');
            }
        }
        redirect();
    }
}