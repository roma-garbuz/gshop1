<?php

namespace app\controllers\admin;

use RedBeanPHP\R;
use gshop\App;
class CategoriesController extends AppController
{
    public $data;
    protected $template;

    public function indexAction(){
        $this->setMeta('Категории','Категории','Категории');
        $this->getCategories();
    }
    public function getCategories(){
        $this->data = \R::getAssoc("SELECT * FROM categories");
        debug($this->data);

    }
    public function htmlCategories(){

    }
}

