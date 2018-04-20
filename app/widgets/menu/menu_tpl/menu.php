<?php $parent = isset($category['childs']);?>
<li data-id="<?php echo $id?>">
    <a href="<?php echo $category['categories_alias']?>"><?php echo $category['categories_name']?></a>
    <?php if(isset($category['childs'])):?>
        <ul class="sub-menu">
            <?php echo $this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif; ?>
</li>