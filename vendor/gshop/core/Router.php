<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.04.2018
 * Time: 17:23
 */

namespace gshop;


class Router
{
    protected static $routes=[];
    protected static $route=[];

    public static function add($regexp,$route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)) {
           $controller = 'app\controllers\\'.self::$route['prefix']. self::$route['controller']. 'Controller';
            if(class_exists($controller)){
                $controllerObject = new $controller(self::$route);
                $action = self::loverCamelCace(self::$route['action']).'Action';
                if(method_exists($controllerObject,$action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw  new \Exception("Метод $controller::$action не найден");
                }
            } else {
                throw  new \Exception("Контроллер $controller не найден");
            }
        } else {
            throw new \Exception("Страница {$url} не найдена");
        }
    }

    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k=>$v){
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCace($route['controller']);
                self::$route = $route;
                return true;
            }

        }
        return false;
    }
    //С большой буквы
    protected static function upperCamelCace($str){
        return str_replace(' ','',ucwords(str_replace('-',' ', $str)));
    }
    //С маленькой буквы
    protected static function loverCamelCace($str){
         return lcfirst(self::upperCamelCace($str));
    }

    protected static function removeQueryString($url){
        if($url){
            $params = explode('&',$url,2);
            if(false === strpos($params[0],'=')){
                return rtrim($params[0],'/');
            } else {
                return '';
            }
        }
    }

}