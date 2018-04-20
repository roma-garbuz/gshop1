<?php
namespace app\controllers;


use gshop\Cache;

class MainController extends AppController
{
    public function indexAction(){
        $this->setMeta('Главная','Мета описание','ключевые слова');
    }
}