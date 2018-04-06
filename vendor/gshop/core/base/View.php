<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.04.2018
 * Time: 11:37
 */

namespace gshop\base;


class View
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = ['title' => '', 'description' => '', 'keywords' => ''];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route =  $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if($layout === false){
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    public function render($data){
        if(is_array($data)) extract($data);
        $viewFile = APP . "/views{$this->prefix}".THEME."/{$this->controller}/{$this->view}.php";

        if(is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид {$viewFile}", 500);
        }
        if(false !== $this->layout) {
           $layoutFile = APP . "/views".THEME."/layouts/{$this->layout}.php";
            if(is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Не найден шаблон {$this->layout}", 500);
            }
        }
    }

    public function getMeta (){
        $output ='<title>'.$this->meta['title'].'</title>'.PHP_EOL;
        $output .='<meta name="description" content="'.$this->meta['description'].'">'.PHP_EOL;
        $output .='<meta name="keywords" content="'.$this->meta['keywords'].'">'.PHP_EOL;
        return $output;
    }
}