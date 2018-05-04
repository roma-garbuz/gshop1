<option value="<?=$id?>"><?=$tab . $category['categories_name']?></option>
<?php if(isset($category['childs'])):?>
    <?=$this->getMenuHtml($category['childs'],'&nbsp' .$tab . '-');?>
<?php endif;?>