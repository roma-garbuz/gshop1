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

    public function htmlCategories($tree, $tab=''){
        $str = '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category,$tab,$id);
        }
        return $str;
    }

    protected function catToTemplate($category,$tab,$id){
        ob_start();
        require $this->template;
        return ob_get_clean();
    }
    /* Sort Category */

    protected function parseJsonArray($jsonArray, $parentID = 0) {

        $return = array();
        foreach ($jsonArray as $subArray) {
            $returnSubSubArray = array();
            if (isset($subArray->children)) {
                $returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
            }

            $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
            $return = array_merge($return, $returnSubSubArray);
        }
        return $return;
    }

    public function saveSortAction(){
        $data = json_decode($_POST['data']);
        $_SESSION['error'] = "Не удалось сортировать категории";
        $readbleArray = self::parseJsonArray($data);
        $i=0;
        foreach($readbleArray as $row){
            $i++;
            print_r($row);
        }
        die;
    }
    public function addAction() {
        $this->setMeta('Новая категория');
        $this->template = WWW.'/adminfile/template/categories/categoriesselect.php';
        $this->getTree();
        $tree = $this->htmlCategories($this->tree);
        $this->set(compact('tree'));

    }

}

