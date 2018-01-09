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
                        <h1><?= $item->title?></h1>
                    </div>
                    <div class="announcement_content">
                        <div class="announcement_block clearfix">
                            <div class="announcement_info">
                                <div class="announcement_descr">
                                    <p><?= $item->content?></p>
                                </div>
                                <div class="announcement_tags">
                                    <span><?= $item->interests[0]->category->translation->name?></span>
                                    <?php foreach ($item->interests as $interest):?>
                                        <a href="javascript:void(0);" class="grey_tag"><?= $interest->translation->name?></a>
                                    <?php endforeach;?>
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
                                <div class="announcement_social">
                                    <a href="javascript:void(0);"><img src="/img/user_soc/1.png" alt=""></a>
                                    <a href="javascript:void(0);"><img src="/img/user_soc/2.png" alt=""></a>
                                    <a href="javascript:void(0);"><img src="/img/user_soc/3.png" alt=""></a>
                                    <a href="javascript:void(0);"><img src="/img/user_soc/4.png" alt=""></a>
                                </div>
                            </div>
                            <div class="announcement_photo">
                                <a href="<?= Url::to('/public/profile/' . $item->customer->id)?>" class="title_link"><?= $item->customer->fullName?></a>
                                <span class="item_hint"><?= $item->customer->city->country->translation->name?>, <?= $item->customer->city->translation->name?></span>
                                <a href="javascript:void(0);" class="announcement_img">
                                    <img src="/uploads/<?= $item->customer->id?>/<?= $item->customer->mainImage->file?>" alt="">
                                </a>
                                <a href="<?= Url::to('/public/profile/' . $item->customer->id)?>" class="green_btn">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Смотреть профиль')?></span>
                                </a>
                            </div>
                        </div>

                        <?php if(empty($this->params['user']) || (!$item->isParticipant($this->params['user']->id) && $this->params['user']->id != $item->customer->id)):?>
                        <div class="announcement_btm">
                            <div class="announcement_number">
                                <p><?= \Yii::t('app', 'Уже присоеденились')?></p>
                                <div class="group_number_block"><span class="group_number"><?= $item->participantsCount?></span></div>
                            </div>
                            <?php if (!empty($this->params['user'])):?>
                            <a href="javascript:void(0);" class="green_btn ads-invite" data-adsID="<?= $item->id?>" data-participantID="<?= $this->params['user']->id?>">
                                <span class="green_btn_txt"><?= \Yii::t('app', 'Присоединиться')?></span>
                            </a>
                            <?php endif;?>
                        </div>
                        <?php elseif ($item->isParticipant($this->params['user']->id) || $this->params['user']->id == $item->customer->id):?>
                        <div class="announcement_btm">
                            <div class="announcement_number announcement_number_joined">
                                <p><?= \Yii::t('app', 'Уже присоеденились')?></p>
                                <div class="group_number_block group_number_block_joined">
                                    <span class="group_number"><?= $item->participantsCount?> <?= \Yii::t('app', 'и Вы')?></span>
                                </div>
                            </div>
                            <?php if ($this->params['user']->id != $item->customer->id):?>
                            <a href="javascript:void(0);" class="bordered_btn"><?= \Yii::t('app', 'Отменить')?></a>
                            <?php endif?>
                        </div>
                        <?php endif;?>
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