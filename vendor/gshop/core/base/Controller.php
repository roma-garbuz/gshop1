<?php

namespace gshop\base;

abstract class Controller
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = [];
    public $bottomScript;

    public function __construct($route)
    {
        $this->route =  $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
    }
    public function getView(){
        $viewObject = new View($this->route,$this->layout, $this->view, $this->meta, $this->bottomScript);
        $viewObject->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }
    public function setBottomScript($str){
        $this->bottomScript = $str;
    }
}