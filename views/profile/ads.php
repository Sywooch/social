<?php
use yii\helpers\Url;
?>
<?= $this->render('//site/block/search', []); ?>
    <section class="main_container light_bg">
        <div class="container">
            <div class="wrap_content clearfix">
<?= $this->render('//profile/block/menu', []); ?>
                <div class="content">
                    <?php if (\Yii::$app->session->hasFlash('adsSave')):?>
                    <div class="announcement_topline">
                        <h3><?= \Yii::t('app', 'Все готово');?>!</h3>
                        <p><?= \Yii::t('app', 'Расскажите о своем объявлении');?>:</p>
                        <div class="announcement_topline_icons">
                            <a href="https://twitter.com/home?status=<?= Yii::$app->getRequest()->serverName?>/public/ads/<?= $item->id?>">
                                <img src="/img/social/twitter.svg" alt="">
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?sdk=joey&u=<?= Yii::$app->getRequest()->serverName?>/public/ads/<?= $item->id?>">
                                <img src="/img/social/facebook.svg" alt="">
                            </a>
                            <a href="http://vk.com/share.php?url=http://<?= Yii::$app->getRequest()->serverName?>/public/ads/<?= $item->id?>">
                                <img src="/img/social/vk.svg" alt="">
                            </a>
                            <a href="https://plus.google.com/share?url=<?= Yii::$app->getRequest()->serverName?>/public/ads/<?= $item->id?>">
                                <img src="/img/social/google-plus.svg" alt="">
                            </a>
                            <a href="#">
                                <img src="/img/social/odnoklassniki-logo.svg" alt="">
                            </a>
                            <a href="#">
                                <img src="/img/social/youtube.svg" alt="">
                            </a>
                        </div>
                    </div>
                    <?php endif;?>
                    <div class="title_block clearfix">
                        <h1><?= $item->title?></h1>
                    </div>
                    <div class="announcement_content">
                        <div class="announcement_block clearfix">
                            <div class="announcement_info">
                                <div class="announcement_descr announcement_descr_without_ic">
                                    <p><?= $item->content?></p>
                                </div>

                                <div class="user_data">
                                    <table class="user_data_table">
                                        <thead>
                                        <tr>
                                            <th colspan="2"><?= \Yii::t('app', 'Мои данные')?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <td><?= $item->data?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="user_preferences">
                                    <table class="user_data_table">
                                        <thead>
                                        <tr>
                                            <th colspan="2"><?= \Yii::t('app', 'Мои предпочтения')?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?= \Yii::t('app', 'Город')?>:</td>
                                            <td>
                                                <?php if(!empty($item->city)):?>
                                                    <?= $item->city->translation->name?>
                                                <?php else:?>
                                                    <?= \Yii::t('app', 'Не важно')?>
                                                <?php endif;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?= \Yii::t('app', 'Пол')?>:</td>
                                            <td><?= $item->sexTypes[$item->sex]?></td>
                                        </tr>
                                        <tr>
                                            <td><?= \Yii::t('app', 'Дата встречи')?>:</td>
                                            <td>
                                                <?= \Yii::$app->formatter->asDate($item->date, 'd MMMM yyyy') ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="announcement_tags">
                                    <span><?= $item->interests[0]->category->translation->name?></span>
                                    <?php foreach ($item->interests as $interest):?>
                                        <a href="javascript:void(0);" class="grey_tag"><?= $interest->translation->name?></a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="announcement_photo">
                                <a href="<?= Url::to('/public/profile/' . $item->customer->id)?>" class="title_link"><?= $item->customer->fullName?></a>
                                <span class="item_hint"><?= $item->customer->city->area->country->translation->name?>, <?= $item->customer->city->translation->name?></span>
                                <a href="javascript:void(0);" class="announcement_img">
                                    <?php if (!empty($item->customer->mainImage)):?>
                                        <img src="/uploads/<?= $item->customer->id?>/<?= $item->customer->mainImage->file?>" alt="">
                                    <?php else:?>
                                        <img src="/img/no-img-<?= $item->customer->sex?>.jpg" alt="">
                                    <?php endif;?>
                                </a>
                                <a href="<?= Url::to('/public/profile/' . $item->customer->id)?>" class="green_btn">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Смотреть профиль')?></span>
                                </a>
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
