<?php
    $letter = null;
?>

<div class="city_modal_top">
    <h4><?= $country->translation->name?></h4>
    <a href="javascript:void(0)" class="change-country"><?= \Yii::t('app', 'Сменить страну')?></a>
    <input type="text" class="typical_input_bordered selector-area-search" data-id="<?= $country->id?>" placeholder="<?= \Yii::t('app', 'Введите область')?>"/>
</div>
<div class="city_modal_btm">
    <ul>
        <?php foreach ($areas as $item):?>
            <?php if (!empty($item['sort'])):?>
                <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-area"><?= $item['name']?></a></li>
            <?php else:?>
                <?php if ($letter !=  mb_substr($item['name'], 0, 1, "UTF-8")):?>
                    <?php $letter = mb_substr($item['name'], 0, 1, "UTF-8");?>
                    <li class="city_letter"><?= $letter?></li>
                    <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-area"><?= $item['name']?></a></li>
                <?php else:?>
                    <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-area"><?= $item['name']?></a></li>
                <?php endif;?>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</div>