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
        <h1><?= \Yii::t('app', 'Мои объявления');?></h1>
        <a href="<?= Url::to('/profile/create-ads')?>" class="add_button"><?= \Yii::t('app', 'Создать новое');?></a>
    </div>
    <div class="companies_content">
        <div class="announcement_inner_block">
            <div class="announcement_inner_block_active">
                <h2><?= \Yii::t('app', 'Активные объявления')?></h2>
                <?php foreach ($adsList as $ads):?>
                    <?php if ($ads->active == \app\models\Ads::STATUS_NOT_ACTIVE) continue;?>
                <!-- announcement_inner_block_item -->
                <div class="announcement_inner_block_item clearfix">
                    <div class="announcement_item_txt">
                        <span class="announcement_ic"></span>
                        <h3><?= $ads->title ?></h3>
                        <p><?= $ads->content ?></p>
                        <a href="javascript:void(0)" class="green_btn raise_link">
                            <span class="green_btn_txt"><?= \Yii::t('app', 'Поднять на 1 место')?></span>
                        </a>
                        <a href="<?= Url::to('/profile/unset-ads/' . $ads->id)?>" class="hide_link"><?= \Yii::t('app', 'Снять с публикации')?></a>
<!--                        <p><b>Объявление поднято в поиске.</b></p>-->
<!--                        <p><b>Повторное поднятие возможно через 8 часов.</b></p>-->
                        <p><b>
                                <?= \Yii::t('app', 'Объявление на')?> <?= $ads->position?> <?= \Yii::t('app', 'месте в категории')?>
                                “<?= $ads->interests[0]->category->translation->name?>”
                            </b></p>
                        <a href="<?= Url::to('/profile/edit-ads/' . $ads->id)?>" class="edit_link"><?= \Yii::t('app', 'Редактировать')?></a>


                        <!--       announcement_mod            -->

                        <div style="display: none;">
                            <div class="box-modal announcement_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="ann_mod_top">
                                        <h3><?= \Yii::t('app', 'Поднятие объявления на 1 место')?></h3>
                                        <div class="ann_mod_img">
                                            <img src="/img/ann_popup.jpg" alt="">
                                        </div>
                                        <span class="green_txt"><?= \Yii::t('app', 'Стоимость')?>: 500 руб.</span>
                                    </div>
                                    <div class="ann_mod_btm">
                                        <h3><?= \Yii::t('app', 'Способ оплаты')?>:</h3>
                                        <div class="ann_mod_pay">
                                            <a href="#" class="pay_link"><img src="/img/pay/1.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="/img/pay/2.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="/img/pay/3.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="/img/pay/4.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="/img/pay/5.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="announce_item_info">
                        <h4><?= \Yii::t('app', 'Создано')?> </h4>
                        <p><?= date('d.m.Y', strtotime($ads->timeCreate))?></p>
                        <h4><?= \Yii::t('app', 'Просмотров')?> </h4>
                        <p><?= $ads->views?></p>
                    </div>

                </div>
                <?php endforeach;?>
            </div>


            <div class="announcement_inner_block_archive">
                <h2><?= \Yii::t('app', 'Объявления в архиве')?></h2>
                <?php foreach ($adsList as $ads):?>
                <?php if ($ads->active == \app\models\Ads::STATUS_ACTIVE) continue;?>
                <!-- announcement_inner_block_item -->
                <div class="announcement_inner_block_item clearfix">
                    <div class="announcement_item_txt">
                        <span class="announcement_ic"></span>
                        <h3><?= $ads->title?></h3>
                        <p><?= $ads->content?></p>
                        <a href="<?= Url::to('/profile/public-ads/' . $ads->id)?>" class="green_btn">
                            <span class="green_btn_txt"><?= \Yii::t('app', 'Опубликовать')?></span>
                        </a>
<!--                        <a href="#" class="green_btn">-->
<!--                            <span class="green_btn_txt">Опубликовать и поднять на 1 место</span>-->
<!--                        </a>-->
                        <p><b>
                                <?= \Yii::t('app', 'Объявление на')?> <?= $ads->position?> <?= \Yii::t('app', 'месте в категории')?>
                                “<?= $ads->interests[0]->category->translation->name?>”
                            </b></p>
                        <a href="<?= Url::to('/profile/edit-ads/' . $ads['id'])?>" class="edit_link"><?= \Yii::t('app', 'Редактировать')?></a>
                    </div>
                    <div class="announce_item_info">
                        <h4><?= \Yii::t('app', 'Добавлено')?> </h4>
                        <p><?= date('d.m.Y', strtotime($ads->timeCreate))?></p>
                        <h4><?= \Yii::t('app', 'Просмотров')?> </h4>
                        <p><?= $ads->views?></p>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
            <div class="decorations_companies">
                            <span class="dec_ann_left_1">
                                <img src="/img/decor/decor_ann_l_1.png" alt="">
                            </span>
                <span class="dec_ann_right_1">
                                <img src="/img/decor/decor_ann_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
