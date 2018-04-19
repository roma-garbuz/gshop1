<div class="page-header">
    <h1>
        Категории
        <div style="margin-top: 10px">
            <a href="<?php echo ADMIN; ?>/categories/add" class="btn btn-primary">
                <i class="menu-icon fa fa-plus"></i>
                Добавить категорию
            </a>
            <button class="btn btn-primary">
                <i class="menu-icon fa fa-plus"></i>
                Добавить продукт
            </button>
        </div>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="row">
            <div class="col-sm-4">
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        <?php echo $tree;?>
                    </ol>
                </div>
                <input type="hidden" id="nestable-output">
                <button id="cat-save" class="btn disabled btn-primary"><i class="ace-icon fa fa-floppy-o bigger-120"></i>  Сохранить сортировку</button>
            </div>

            <div class="vspace-16-sm"></div>

            <div class="col-sm-8">
                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th></th>
                            <th>Название</th>

                            <th class="hidden-480">Статус</th>

                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="center">
                                <i class="ace-icon fa fa-folder-o bigger-200 blue"></i>

                            </td>
                            <td>Продукт 1</td>

                            <td class="hidden-480 center">
                                <label class="pull-right inline">
                                    <input id="id-button-borders" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
                                    <span class="lbl middle"></span>
                                </label>
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">


                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="center">
                                <img height="50" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg">
                            </td>
                            <td>Продукт 1</td>

                            <td class="hidden-480 center">
                                <label class="pull-right inline">
                                    <input id="id-button-borders" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
                                    <span class="lbl middle"></span>
                                </label>
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">


                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="center">
                                <img height="50" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg">
                            </td>
                            <td>Продукт 1</td>

                            <td class="hidden-480 center">
                                <label class="pull-right inline">
                                    <input id="id-button-borders" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
                                    <span class="lbl middle"></span>
                                </label>
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">


                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="center">
                                <img height="50" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg">
                            </td>
                            <td>Продукт 1</td>

                            <td class="hidden-480 center">
                                <label class="pull-right inline">
                                    <input id="id-button-borders" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
                                    <span class="lbl middle"></span>
                                </label>
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">


                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td class="center">
                                <img height="50" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="assets/images/avatars/profile-pic.jpg">
                            </td>
                            <td>Продукт 1</td>

                            <td class="hidden-480 center">
                                <label class="pull-right inline">
                                    <input id="id-button-borders" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
                                    <span class="lbl middle"></span>
                                </label>
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs action-buttons">


                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script src="assets/js/jquery.nestable.min.js"></script>

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
        $("#cat-save").click(function(){
            $("#cat-save .ace-icon").removeClass('fa-floppy-o');
            $("#cat-save .ace-icon").addClass('fa-spinner fa-spin');

            var dataString = {
                data : $("#nestable-output").val(),
            };

            $.ajax({
                type: "POST",
                url: "<?php echo ADMIN?>/categories/save-sort",
                data: dataString,
                cache : false,
                success: function(data){
                    $("#cat-save .ace-icon").addClass('fa-floppy-o');
                    $("#cat-save .ace-icon").removeClass('fa-spinner fa-spin');
                    $('#cat-save').addClass('disabled');
                    alert('Data has been saved');

                } ,error: function(xhr, status, error) {
                    alert(error);
                },
            });
        });


    });
</script>


