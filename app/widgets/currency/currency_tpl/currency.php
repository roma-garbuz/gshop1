<div class="btn-group" id="currency">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="currency/change?curr=<?=$this->currency['code']?>">
        <?=$this->currency['code']?><span class="caret"></span></a>
    <ul class="dropdown-menu">
        <?php foreach ($this->currencies as $k=>$v):?>
            <?php if($k != $this->currency['code']):?>
                <li class="dropdown-item"><a href="currency/change?curr=<?=$k?>"><?=$k?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>