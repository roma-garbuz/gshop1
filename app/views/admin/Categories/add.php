<div class="page-header">
    <h1>
        Добавить категорию
    </h1>
</div>
<div class="row">
    <form class="form-horizontal" role="form" action="<?php echo ADMIN?>/categories/add" method="post" id="validation-form" novalidate="novalidate">
        <div class="col-sm-4">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="widget-title smaller">Основные сведения</h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="active">Активная</label> <input name="active" class="ace ace-switch ace-switch-6" type="checkbox" checked />
                                <span class="lbl middle"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="parent_id">Родительская категория</label>

                                <?php
                                new \app\widgets\menu\Menu([
                                    'cache'=>0,
                                    'cacheKey' => 'catSelectMenu',
                                    'class' => 'form-control',
                                    'container' => 'select',
                                    'attrs' => [
                                            'id'=>'parent_id',
                                            'name'=>'parent_id'
                                    ],
                                    'tpl' => WIDGETS. '/menu/menu_tpl/categoriesselect.php',
                                    'prepend'=>'<option value="0"></option>',
                                    'data'=>  \R::getAssoc("SELECT c.id,c.parent_id,c.sort_order,cd.categories_name,cd.categories_alias  FROM categories c, categories_description cd WHERE c.id = cd.id AND cd.language_id = ".\gshop\App::$app->getProperty('baseLang')." ORDER BY sort_order"),
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input multiple="" type="file" id="categories_image" name="categories_image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="widget-title smaller">Название и описание</h4>
                </div>
                <div class="">
                    <div class="widget-main">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <?php foreach (\app\widgets\language\Language::getLanguages() as $k=>$v):?>
                                        <li <?php if($v['base'] == 1):echo 'class="active"';endif;?>>
                                            <a data-toggle="tab" href="#<?=$k?>" <?php echo ($v['base'] == 1)? 'aria-expanded="true"' : 'aria-expanded="false"';?>>
                                                <img src="assets/images/icons/<?=$k?>.ico" alt="<?=$k?>" width="24px"> <?=$v['name']?>
                                            </a>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>

                                    <div class="tab-content">
                                        <?php foreach (\app\widgets\language\Language::getLanguages() as $k=>$v):?>
                                        <div id="<?=$k?>" class="tab-pane fade <?php if($v['base'] == 1):echo 'active in';endif;?>">
                                            <div class="row">
                                                <div class="form-group group-name">
                                                    <div class="col-sm-4 control-label">
                                                        <label>Название</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Название" name="desc[categories_name][<?=$v['languages_id']?>]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label>Oписание</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="wysiwyg-editor" id="editor<?=$v['languages_id']?>"></div>
                                                        <textarea name="desc[categories_description][<?=$v['languages_id']?>]" id="description<?=$v['languages_id']?>" value="" style="display: none;"></textarea>
                                                        <script>
                                                           jQuery(function($) {
                                                                $('#saveBtn').on('click',function () {

                                                                    $("#description<?=$v['languages_id']?>").val($("#editor<?=$v['languages_id']?>").html());
                                                                    $('#validation-form').validate({
                                                                        errorElement: 'div',
                                                                        errorClass: 'help-block',
                                                                        focusInvalid: true,
                                                                        ignore: '',
                                                                        rules: {
                                                                            'desc[categories_name][<?=$v['languages_id']?>]' : {
                                                                                required: true,
                                                                            },

                                                                        },
                                                                        messages: {
                                                                            'desc[categories_name][<?=$v['languages_id']?>]': {
                                                                                required: 'Это обязательное поле',
                                                                            },
                                                                        },
                                                                        highlight: function (e) {
                                                                            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                                                                        },

                                                                        success: function (e) {
                                                                            $(e).closest('.form-group').removeClass('has-error');
                                                                            $(e).remove();
                                                                        },



                                                                    });
                                                                })
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label>Имя ссылки (латиницей)</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Имя ссылки" name="desc[categories_alias][<?=$v['languages_id']?>]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label>Ключевые слова</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="Ключевые слова" name="desc[keywords][<?=$v['languages_id']?>]" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label>SEO описание</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" placeholder="SEO описание" name="desc[seodescription][<?=$v['languages_id']?>]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="col-sm-12 control-label">
                    <button id="saveBtn" type="submit" class="btn btn-lg btn-success pull-right">
                        <i class="ace-icon fa fa-check"></i>
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
