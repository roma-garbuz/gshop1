<?php

namespace gshop;


class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R','\R');
        \R::setup($db['dsn'],$db['user'],$db['pass']);
        \R::ext('xdispense', function ($table_name){
           return \R::getRedBean()->dispense($table_name);
        });
        if(!\R::testConnection()){
            throw new \Exception("База данных не подключена", 500);
        }
        if(DEBUG) {
            \R::freeze(false);
            \R::debug(true,1);
        }
    }
}