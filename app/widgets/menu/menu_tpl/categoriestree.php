<?php $parent = isset($category['childs']);?>
<li class="dd-item dd-nodrag" data-id="<?php echo $id?>">
    <div class="dd-handle">
       <?php echo $category['categories_name']?>
        <div class="pull-right action-buttons">
            <a class="blue" href="/category/edit/<?php echo $id?>">
                <i class="ace-icon fa fa-pencil bigger-130"></i>
            </a>

            <a class="red" href="/category/remove/<?php echo $id?>">
                <i class="ace-icon fa fa-trash-o bigger-130"></i>
            </a>
        </div>
    </div>
    <?php if(isset($category['childs'])):?>
        <ol class="dd-list">
            <?php echo  $this->getMenuHtml($category['childs'])?>
        </ol>
    <?php endif; ?>
</li>

