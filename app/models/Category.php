<?php

namespace app\models;

use gshop\App;

class Category extends AppModel
{
    public $attributes = [
        'categories_image' => '',
        'parent_id' => '',
        'sort_order' => '',
        'date_added' => '',
        'last_modified' => '',
        'active' => ''
    ];
    public function getIds($id){
        $cats = App::$app->getProperty('cats');
        $ids=null;
        foreach ($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .=$k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }

    public $rules = [];
}