<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use app\widgets\language\Language;
use gshop\App;
use gshop\base\Controller;
use gshop\Cache;


class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('currencies', Currency::getCurrencies());
        App::$app->setProperty('currency',Currency::getCurrency(App::$app->getProperty('currencies')));

        App::$app->setProperty('languages', Language::getLanguages());
        App::$app->setProperty('language',Language::getLanguage(App::$app->getProperty('languages')));

        App::$app->setProperty('cats',self::cacheCategory());
        debug(App::$app->getProperties());
    }

    public static function cacheCategory(){
        $cache=Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM categories");
            $cache->set('cats',$cats);
        }
        return $cats;
    }
}