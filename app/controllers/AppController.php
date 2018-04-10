<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.04.2018
 * Time: 11:22
 */

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use app\widgets\language\Language;
use gshop\App;
use gshop\base\Controller;


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
    }
}