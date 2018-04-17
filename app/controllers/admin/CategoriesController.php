<?php

namespace app\controllers\admin;

use RedBeanPHP\R;
use gshop\App;
class CategoriesController extends AppController
{
    public $data;
    protected $template;
    protected $tree;
    public $htmlTree;

    public function __construct($route)
    {
        parent::__construct($route);
        $this->template = WWW.'/adminfile/template/categories/categoriestree.php';
    }

    public function indexAction(){
        $this->setMeta('Категории','Категории','Категории');

        $this->getTree();
        $tree = $this->htmlCategories($this->tree);
        $this->set(compact('tree'));
    }

    protected function getTree(){
        $baseLang = App::$app->getProperty('baseLang');
        $data = \R::getAssoc("SELECT c.categories_id,c.parent_id,c.sort_order,cd.categories_name,cd.categories_alias  FROM categories c, categories_description cd WHERE c.categories_id = cd.categories_id AND cd.language_id = $baseLang ORDER BY sort_order");
        $tree = [];
        foreach ($data as $id => &$node){
            if(!$node['parent_id']){
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        $this->tree = $tree;
    }

    public function htmlCategories($tree){
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category,$id);
        }
        return $str;
    }

    protected function catToTemplate($category,$id){
        ob_start();
        require $this->template;
        return ob_get_clean();
    }
}

