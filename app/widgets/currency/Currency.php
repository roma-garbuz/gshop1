<?php

namespace app\widgets\currency;
use gshop\App;
use gshop\TSingletone;
class Currency
{
    protected $tpl;
    protected $currencies;
    protected $currency;

    public function __construct()
    {
        $this->tpl = __DIR__. '/currency_tpl/currency.php';
        $this->run();
    }

    public function run(){
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    public static function getCurrencies(){
        return \R::getAssoc("SELECT code, title, symbol_left, symbol_right, value, base FROM currencies ORDER BY base DESC");
    }

    public static function getCurrency($currencies){
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies)){
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    public function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }

}