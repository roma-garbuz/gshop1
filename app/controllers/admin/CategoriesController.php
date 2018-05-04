<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\Category;
use RedBeanPHP\Adapter;
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

    }

    public function indexAction(){
        $this->setMeta('Категории','Категории','Категории');
        $this->setBottomScript("<script src='assets/js/jquery.nestable.min.js'></script>
            <script>
                $(document).ready(function()
                {
                    var updateOutput = function(e)
                    {
                        var list   = e.length ? e : $(e.target),
                            output = list.data('output');
                        if (window.JSON) {
                            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                        } else {
                            output.val('JSON browser support required for this demo.');
                        }
                    };
            
                    // activate Nestable for list 1
                    $('#nestable').nestable({
                        group: 1
                    })
                        .on('change', updateOutput);
            
            
            
                    // output initial serialised data
                    updateOutput($('#nestable').data('output', $('#nestable-output')));
            
            
                    $('#nestable').on('change', function() {
                        $('#cat-save').removeClass('disabled');
                    });
                    $('#cat-save').click(function(){
                        $('#cat-save .ace-icon').removeClass('fa-floppy-o');
                        $('#cat-save .ace-icon').addClass('fa-spinner fa-spin');
            
                        var dataString = {
                            data : $('#nestable-output').val(),
                        };
            
                        $.ajax({
                            type: 'POST',
                            url: '" .  ADMIN . "/categories/save-sort',
                            data: dataString,
                            cache : false,
                            success: function(data){
                                $('#cat-save .ace-icon').addClass('fa-floppy-o');
                                $('#cat-save .ace-icon').removeClass('fa-spinner fa-spin');
                                $('#cat-save').addClass('disabled');
                                alert('Data has been saved');
            
                            } ,error: function(xhr, status, error) {
                                alert(error);
                            },
                        });
                    });
            
            
                });
            </script>");
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
        if(!empty($_POST)) {

            $category = new Category();
            $data = $_POST;

            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            $category->attributes['sort_order'] = 1000;
            $category->attributes['date_added'] = date('Y-m-d G:i:s');
            $category->attributes['last_modified'] = date('Y-m-d G:i:s');
            $category->attributes['active'] == 'on'?$category->attributes['active'] = 1:$category->attributes['active'] = 0;

            foreach ($data['desc']['categories_name'] as $l => $v){
                if($data['desc']['categories_name'][$l] == ''){
                    $data['desc']['categories_name'][$l] = $data['desc']['categories_name'][App::$app->getProperty('baseLang')];
                }
            }
            foreach ($data['desc']['categories_alias'] as $l => $v){
                if($data['desc']['categories_alias'][$l] != ''){
                    $data['desc']['categories_alias'][$l] = AppModel::str2url($v);
                } else {
                    $data['desc']['categories_alias'][$l] = AppModel::str2url($data['desc']['categories_name'][$l]);
                }

            }

            $catDesc = [];
            foreach ($data['desc'] as $name=>$lng){
                foreach ($lng as $l=>$v) {
                    $catDesc[$l]['language_id'] = $l;
                    $catDesc[$l][$name] = $v;
                }
            }
            if ($new_id = $category->save('categories', 'categories_description',$catDesc)) {
                $_SESSION['success'] = 'Категория добавлена-'. $new_id ;

            } else {
                $_SESSION['error'] = 'Ошибка';
            }
            redirect(ADMIN . '/categories');
        }
        $this->setMeta('Новая категория');
        $this->setBottomScript("
            <script src='assets/js/jquery.validate.min.js'></script>
            <script src='assets/js/jquery.hotkeys.index.min.js'></script>
		    <script src='assets/js/bootstrap-wysiwyg.min.js'></script>
            <script>
                jQuery(function($) {
                   
                    $('#categories_image').ace_file_input({
                        style: 'well',
                        btn_choose: 'Перетащите файл или нажмите сюда',
                        btn_change: null,
                        no_icon: 'ace-icon fa fa-picture-o',
                        droppable: true,
                        thumbnail: 'large'//large | fit
                        //,icon_remove:null//set null, to hide remove/reset button
                        /**,before_change:function(files, dropped) {
                                    //Check an example below
                                    //or examples/file-upload.html
                                    return true;
                                }*/
                        /**,before_remove : function() {
                                    return true;
                                }*/
                        ,
                        preview_error : function(filename, error_code) {
                            //name of the file that failed
                            //error_code values
                            //1 = 'FILE_LOAD_FAILED',
                            //2 = 'IMAGE_LOAD_FAILED',
                            //3 = 'THUMBNAIL_FAILED'
                            //alert(error_code);
                        }
            
                    }).on('change', function(){
                        //console.log($(this).data('ace_input_files'));
                        //console.log($(this).data('ace_input_method'));
                    });
                    
                     $('.wysiwyg-editor').ace_wysiwyg({
                        toolbar:
                        [
                            'font',
                            null,
                            'fontSize',
                            null,
                            {name:'bold', className:'btn-info'},
                            {name:'italic', className:'btn-info'},
                            {name:'strikethrough', className:'btn-info'},
                            {name:'underline', className:'btn-info'},
                            null,
                            {name:'insertunorderedlist', className:'btn-success'},
                            {name:'insertorderedlist', className:'btn-success'},
                            {name:'outdent', className:'btn-purple'},
                            {name:'indent', className:'btn-purple'},
                            null,
                            {name:'justifyleft', className:'btn-primary'},
                            {name:'justifycenter', className:'btn-primary'},
                            {name:'justifyright', className:'btn-primary'},
                            {name:'justifyfull', className:'btn-inverse'},
                            null,
                            {name:'createLink', className:'btn-pink'},
                            {name:'unlink', className:'btn-pink'},
                            null,
                            {name:'insertImage', className:'btn-success'},
                            null,
                            'foreColor',
                            null,
                            {name:'undo', className:'btn-grey'},
                            {name:'redo', className:'btn-grey'}
                        ],
                        
                    }).prev().addClass('wysiwyg-style2');
                });
            </script>");

    }

}

