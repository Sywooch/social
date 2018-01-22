<?php
use yii\helpers\Url;
?>

<?= $this->render('//site/block/search', []); ?>
<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>
            <div class="content">
                <div class="title_block clearfix">
                    <h1>Мои друзья</h1>
                </div>
                <div class="index_message_content">
                    <div class="index_message_top">
                        <div class="mess_searchline">
                            <input type="search" class="typical_input_bordered" placeholder="Поиск по сообщениям" />
                            <div class="friends_searchline_city">
                                <p>Город</p>
                                <div class="inner_search_select">
                                    <select>
                                        <option>Россия, Москва</option>
                                        <option>Другая страна...</option>
                                        <option>Россия, Московская область</option>
                                        <option>Россия, Санкт-Петербург</option>
                                        <option>Россия. Ленинградская область</option>
                                        <option>Другой город...</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="friend_age">
                            <p>Возраст</p>
                            <div class="typical_select_bordered">
                                <select>
                                    <option>от</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                </select>
                            </div>
                            <div class="typical_select_bordered">
                                <select>
                                    <option>до</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                    <option>15</option>
                                </select>
                            </div>
                            <p>лет</p>
                        </div>
                        <ul class="typical_chbx_orange typical_chbx_green">
                            <li>
                                <label>
                                    <input type="checkbox" class="styler">
                                    <span>Женщина</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" class="styler">
                                    <span>Мужчина</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" class="styler">
                                    <span>Онлайн</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <?php if (!empty(\app\components\Registry::get('user')->friends)):?>
                    <div class="friends_block">
                        <?php foreach (\app\components\Registry::get('user')->friends as $friend):?>
                        <div class="friends_block_item clearfix">
                            <div class="friends_block_item_left clearfix">
                                <a href="<?= Url::to('/public/profile/' . $friend->id)?>" class="message_author">
                                    <img src="/uploads/<?= $friend->id?>/<?= $friend->mainImage->file?>" alt="">
                                </a>
                                <div class="index_message_item_left_txt">
                                    <a href="<?= Url::to('/public/profile/' . $friend->id)?>"><?= $friend->fullName?></a>
                                    <p><?= date('d.m.Y', strtotime($friend->birthday))?></p>
                                </div>
                            </div>
                            <div class="friends_block_item_right">
                                <a href="<?= Url::to('/profile/create-dialog/' . $friend->id)?>" class="green_btn create-dialog">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Отправить сообщение')?></span>
                                </a>
                                <a href="javascript:void(0)" class="typical_link"><?= \Yii::t('app', 'Убрать из друзей')?></a>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <div class="decorations_companies">
                            <span class="dec_comp_left_1">
                                <img src="/img/decor/decor_comp_l_1.png" alt="">
                            </span>
                <span class="dec_comp_right_1">
                                <img src="/img/decor/decor_comp_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
