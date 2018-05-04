<?php
namespace gshop\base;

use gshop\Db;
use Valitron\Validator;

abstract class Model
{
    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }

    public function load($data){

        foreach ($this->attributes as $name=>$value){
            if(isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function save($table,$table2='',$own=[]){
        if($table2){
            $ownName = 'own'.$table2.'List';
            $tbl = \R::xdispense($table);

            foreach ($this->attributes as $name => $value){
                $tbl->$name = $value;
            }
            foreach ($own as $lng => $item){
                $tbl2 = \R::xdispense($table2);
                foreach ($item as $name => $value){
                    $tbl2->$name = $value;
                }
                $tbl->ownItemList[] = $tbl2;
            }
            return \R::store($tbl);
        } else {
            $tbl = \R::xdispense($table);
            debug($tbl);die;
            foreach ($this->attributes as $name => $value){
                $tbl->$name = $value;
            }
            return \R::store($tbl);
        }


    }

    public function validate($data){
        Validator::lang('ru');
        $v = new Validator($data);

        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors =$v->errors();
        return false;
    }

    public function getErrors(){
        $errors = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .= '<div><strong><i class="ace-icon fa fa-times"></i></strong> '.$item.'</div>';
            }
        }
        $errors .= '</div>';
        $_SESSION['error'] = $errors;
    }


}