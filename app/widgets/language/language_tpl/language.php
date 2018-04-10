<div class="btn-group" id="language">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="language/change?lng=<?=$this->language['code']?>">
        <?=$this->language['code']?><span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php foreach ($this->languages as $k=>$v):?>
            <?php if($k != $this->language['code']):?>
                <li class="dropdown-item"><a href="language/change?lng=<?=$k?>"><?=$k?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>