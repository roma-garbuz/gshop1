<?php

namespace app\widgets\menu;


use gshop\Cache;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $template;
    protected $container = 'ul';
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey ='category_menu';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options=[]){
        $this->template = __DIR__. '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach ($options as $k => $v){
            if(property_exists($this,$k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run(){
        $cache=Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){

        }
        $this->output();

    }

    protected function output(){
        echo $this->menuHtml;
    }
}