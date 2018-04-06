<?php
// Проверка на единое создание экземпляра
namespace gshop;


trait TSingletone
{

    private static $instance;

    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}