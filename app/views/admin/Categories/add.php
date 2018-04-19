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
                                <select class="form-control" id="parent_id" name="parent_id">
                                    <option value="0"></option>
                                    <?php echo $tree;?>
                                </select>
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
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active">
                                            <a data-toggle="tab" href="#ru" aria-expanded="true">
                                                <img src="assets/images/icons/Russia.ico" alt="Ru" width="24px"> Русский
                                            </a>
                                        </li>

                                        <li class="">
                                            <a data-toggle="tab" href="#en" aria-expanded="false">
                                                <img src="assets/images/icons/United-Kingdom.ico" alt="En" width="24px"> English
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="tab-content">
                                        <div id="ru" class="tab-pane fade active in">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label for="categories_name">Название</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="categories_name" placeholder="Название" name="categories_name" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label for="categories_description">Oписание</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="wysiwyg-editor" id="editor1"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label for="name">Имя ссылки (латиницей)</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="seoname" placeholder="Имя ссылки" name="seoname" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label for="name">Ключевые слова</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="keywords" placeholder="Ключевые слова" name="keywords" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 control-label">
                                                        <label for="name">SEO описание</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" id="seodescription" placeholder="SEO описание" name="seodescription"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="en" class="tab-pane fade">
                                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                        </div>
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
                    <button type="submit" class="btn btn-lg btn-success pull-right">
                        <i class="ace-icon fa fa-check"></i>
                        Добавить
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="assets/js/jquery.hotkeys.index.min.js"></script>
<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
<script>
    jQuery(function($) {

        function showErrorAlert (reason, detail) {
            var msg='';
            if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
            else {
                //console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
        }

        //$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

        //but we want to change a few buttons colors for the third style
        $('#editor1').ace_wysiwyg({
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
            'wysiwyg': {
                fileUploadError: showErrorAlert
            }
        }).prev().addClass('wysiwyg-style2');

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
        if ( typeof jQuery.ui !== 'undefined' && ace.vars['webkit'] ) {

            var lastResizableImg = null;
            function destroyResizable() {
                if(lastResizableImg == null) return;
                lastResizableImg.resizable( "destroy" );
                lastResizableImg.removeData('resizable');
                lastResizableImg = null;
            }

            var enableImageResize = function() {
                $('.wysiwyg-editor')
                    .on('mousedown', function(e) {
                        var target = $(e.target);
                        if( e.target instanceof HTMLImageElement ) {
                            if( !target.data('resizable') ) {
                                target.resizable({
                                    aspectRatio: e.target.width / e.target.height,
                                });
                                target.data('resizable', true);

                                if( lastResizableImg != null ) {
                                    //disable previous resizable image
                                    lastResizableImg.resizable( "destroy" );
                                    lastResizableImg.removeData('resizable');
                                }
                                lastResizableImg = target;
                            }
                        }
                    })
                    .on('click', function(e) {
                        if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
                            destroyResizable();
                        }
                    })
                    .on('keydown', function() {
                        destroyResizable();
                    });
            }

            enableImageResize();

            /**
             //or we can load the jQuery UI dynamically only if needed
             if (typeof jQuery.ui !== 'undefined') enableImageResize();
             else {//load jQuery UI if not loaded
			//in Ace demo ./components will be replaced by correct components path
			$.getScript("assets/js/jquery-ui.custom.min.js", function(data, textStatus, jqxhr) {
				enableImageResize()
			});
		}
             */
        }

    });
</script>