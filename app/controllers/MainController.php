<?php
namespace app\controllers;


use gshop\Cache;

class MainController extends AppController
{
    public function indexAction(){
        $this->setMeta('Главная','Мета описание','ключевые слова');
        $name = 'Ilja';
        $price = 300;
        $names = ['roma' ,'jon','mike'];
        $cache = Cache::instance();
        //$cache->set('test',$names);
        //$cache->delete('test');
        $data = $cache->get('test');
        if(!$data){
            $cache->set('test',$names);
        }
        $this->set(compact('name', 'price', 'names', 'posts'));
    }
}