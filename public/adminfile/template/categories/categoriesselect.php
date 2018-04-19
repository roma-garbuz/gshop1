<option value="<?=$id?>"><?=$tab . $category['categories_name']?></option>
<?php if(isset($category['childs'])):?>
    <?=$this->htmlCategories($category['childs'],'&nbsp' .$tab . '-');?>
<?php endif;?>