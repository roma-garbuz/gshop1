<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 09.04.2018
 * Time: 19:08
 */

namespace app\controllers;

use app\widgets\currency\Currency;
use gshop\App;
class CurrencyController extends AppController
{
    public function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;

        if($currency){
            $curr = App::$app->getProperty("currencies");
            $curr[$currency]['code'] = $currency;
            if(!empty($curr[$currency]['code'])){
                setcookie('currency', $curr[$currency]['code'], time()+3600*24*7, '/');
            }
        }
        redirect();
    }

}