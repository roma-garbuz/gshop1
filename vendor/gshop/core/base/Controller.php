<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04.04.2018
 * Time: 11:12
 */

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

    public function __construct($route)
    {
        $this->route =  $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];
    }
    public function getView(){
        $viewObject = new View($this->route,$this->layout, $this->view, $this->meta);
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
}