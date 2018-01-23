<?php
 $letter = null;
?>

<div class="city_modal_top">
    <h4><?= \Yii::t('app', 'Страна')?></h4>
    <input type="text" class="typical_input_bordered selector-country-search" placeholder="<?= \Yii::t('app', 'Введите свою страну')?>" />
</div>
<div class="city_modal_btm">
    <ul>
        <?php foreach ($countries as $item):?>
            <?php if (!empty($item['sort'])):?>
                <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-country"><?= $item['name']?></a></li>
            <?php else:?>
                <?php if ($letter !=  mb_substr($item['name'], 0, 1, "UTF-8")):?>
                    <?php $letter = mb_substr($item['name'], 0, 1, "UTF-8");?>
                    <li class="city_letter"><?= $letter?></li>
                    <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-country"><?= $item['name']?></a></li>
                <?php else:?>
                    <li><a href="javascript:void(0)" data-id="<?= $item['id']?>" class="select-country"><?= $item['name']?></a></li>
                <?php endif;?>
            <?php endif;?>
        <?php endforeach;?>
<!--        <li><a href="#">Москва</a></li>-->
<!--        <li><a href="#">Подольск</a></li>-->
<!--        <li><a href="#">Коломна</a></li>-->
<!--        <li><a href="#">Зеленоград</a></li>-->
<!--        <li class="city_letter">А</li>-->
<!--        <li><a href="">Россия</a></li>-->
<!--        <li><a href="">Австрия</a></li>-->
<!--        <li><a href="">Азербайджан</a></li>-->
<!--        <li><a href="">Албания</a></li>-->
<!--        <li><a href="">Алжир</a></li>-->
<!--        <li><a href="">Ангола</a></li>-->
<!--        <li><a href="">Андорра</a></li>-->
<!--        <li><a href="">Антигуа</a></li>-->
<!--        <li><a href="">Антигуа</a></li>-->
<!--        <li class="city_letter">Б</li>-->
<!--        <li><a href="">Россия</a></li>-->
<!--        <li><a href="">Австрия</a></li>-->
<!--        <li><a href="">Азербайджан</a></li>-->
<!--        <li><a href="">Албания</a></li>-->
<!--        <li><a href="">Алжир</a></li>-->
<!--        <li><a href="">Ангола</a></li>-->
<!--        <li><a href="">Андорра</a></li>-->
<!--        <li><a href="">Антигуа</a></li>-->
<!--        <li class="city_letter">В</li>-->
<!--        <li><a href="">Москва</a></li>-->
<!--        <li><a href="">Подольск</a></li>-->
<!--        <li><a href="">Коломна</a></li>-->
<!--        <li><a href="">Зеленоград</a></li>-->
<!--        <li class="city_letter">г</li>-->
<!--        <li><a href="">Россия</a></li>-->
<!--        <li><a href="">Австрия</a></li>-->
<!--        <li><a href="">Азербайджан</a></li>-->
<!--        <li><a href="">Албания</a></li>-->
<!--        <li><a href="">Алжир</a></li>-->
<!--        <li><a href="">Ангола</a></li>-->
<!--        <li><a href="">Андорра</a></li>-->
<!--        <li><a href="">Антигуа</a></li>-->
<!--        <li class="city_letter">д</li>-->
<!--        <li><a href="">Москва</a></li>-->
<!--        <li><a href="">Подольск</a></li>-->
<!--        <li><a href="">Коломна</a></li>-->
<!--        <li><a href="">Зеленоград</a></li>-->
<!--        <li class="city_letter">е</li>-->
<!--        <li><a href="">Россия</a></li>-->
<!--        <li><a href="">Австрия</a></li>-->
<!--        <li><a href="">Азербайджан</a></li>-->
<!--        <li><a href="">Албания</a></li>-->
<!--        <li><a href="">Алжир</a></li>-->
<!--        <li><a href="">Ангола</a></li>-->
<!--        <li><a href="">Андорра</a></li>-->
<!--        <li><a href="">Антигуа</a></li>-->
<!--        <li class="city_letter">ж</li>-->
<!--        <li><a href="">Москва</a></li>-->
<!--        <li><a href="">Подольск</a></li>-->
<!--        <li><a href="">Коломна</a></li>-->
<!--        <li><a href="">Зеленоград</a></li>-->
    </ul>
</div>