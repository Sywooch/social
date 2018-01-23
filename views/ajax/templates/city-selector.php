<?php
$letter = null;
?>

<div class="city_modal_top">
    <h4><?= $area->translation->name?></h4>
    <a href="javascript:void(0)" class="change-area" data-id="<?= $area->country->id?>"><?= \Yii::t('app', 'Сменить область')?></a>
    <input type="text" class="typical_input_bordered selector-city-search" data-id="<?= $area->id?>" placeholder="<?= \Yii::t('app', 'Введите город')?>"/>
</div>
<div class="city_modal_btm">
    <ul>
        <?php foreach ($cities as $item):?>
            <?php if (!empty($item['sort'])):?>
                <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-city"><?= $item['name']?></a></li>
            <?php else:?>
                <?php if ($letter !=  mb_substr($item['name'], 0, 1, "UTF-8")):?>
                    <?php $letter = mb_substr($item['name'], 0, 1, "UTF-8");?>
                    <li class="city_letter"><?= $letter?></li>
                    <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-city"><?= $item['name']?></a></li>
                <?php else:?>
                    <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-city"><?= $item['name']?></a></li>
                <?php endif;?>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</div>