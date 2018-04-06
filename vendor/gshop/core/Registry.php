<?php
// Проверка на единое создание экземпляра + запихиваем параметров в массив
namespace gshop;


class Registry
{
    use TSingletone;

    public static $properties = [];

    public static function setProperty($name,$value){
        self::$properties[$name] = [$value];
    }

    public function getProperty($name){
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$properties;
    }
}