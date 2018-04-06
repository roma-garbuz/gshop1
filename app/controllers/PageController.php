<?php
namespace app\controllers;


class PageController extends AppController
{
    public function indexAction(){
        $posts = \R::findAll('tabletest');
        $post = \R::findOne('tabletest','id=?', [2]);
        $this->setMeta('Главная','Мета описание','ключевые слова');
        $name = 'Ilja';
        $price = 300;
        $names = ['roma' ,'jon'];
        $this->set(compact('name', 'price', 'names', 'posts'));
    }
}
