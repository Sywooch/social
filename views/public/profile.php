<?php
use yii\helpers\Url;

$messageModel = new \app\models\Messages();
?>
<?= $this->render('//site/block/search', []); ?>
<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>
            <div class="content">
                <?php if (\Yii::$app->session->hasFlash('messageSend')):?>
                <div class="announcement_topline">
                    <h3><?= \Yii::t('app', 'Сообщение отправлено')?>!</h3>
                </div>
                <?php endif;?>
                <div class="title_block clearfix">
                    <h1><?= $item->fullName?></h1>
                </div>
                <div class="profile_page clearfix">
                    <div class="profile_block">
                        <div class="profile_block_top">
                            <div class="profile_quote profile_quote_<?= $item->sex == 1 ? 'm' : 'w'?>">
                                <p><?= $item->title?></p>
                            </div>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'Страна')?>, <?= \Yii::t('app', 'Город')?></td>
                                    <td><?= $item->city->area->country->translation->name?>, <?= $item->city->translation->name?></td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'Языки')?></td>
                                    <td><?php echo implode(', ', $item->languagesList)?></td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'День рождения')?></td>
                                    <td><?= date('d.m.Y', strtotime($item->birthday))?> (<?= $item->age?> <?= \Yii::t('app', 'лет')?>)
                                        <div class="horoscope">
                                            <div class="typical_tooltip horoscope_tooltip">
                                                <span class="tooltip-years chinese_horse"></span>

                                                <!-- change class to display another icon --
<span class="tooltip-years chinese_dog"></span>
<span class="tooltip-years chinese_ox"></span>
<span class="tooltip-years chinese_horse"></span>
<span class="tooltip-years chinese_dragon"></span>
<span class="tooltip-years chinese_goat"></span>
<span class="tooltip-years chinese_rat"></span>
<span class="tooltip-years chinese_snake"></span>
<span class="tooltip-years chinese_tiger"></span>
<span class="tooltip-years chinese_rabbit"></span>
<span class="tooltip-years chinese_rooster"></span>
<span class="tooltip-years chinese_pig"></span>
<span class="tooltip-years chinese_monkey"></span>
-->

                                                <div class="tooltip-content clearfix">
                                                    <p>Год лошади</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'О себе')?></td>
                                    <td><?= $item->about?></td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <?php if(!empty($this->params['user']) && $this->params['user']->id != $item->id):?>
                            <div class="profile_block_top_btns">
                                <?php $form = \yii\widgets\ActiveForm::begin([
                                    'action' => '',
                                    'enableAjaxValidation' => false,
                                    'options' =>
                                        [
                                            'id' => 'profile-message-form',
                                            'class'=>'row',
                                            'enctype' => 'multipart/form-data',
                                            'data-presave' => 'false'
                                        ],
                                    'fieldConfig' => [
                                        'template' => '{input}{error}',
                                        'errorOptions' => ['class' => 'error text-danger'],
                                        'labelOptions' => ['class' => ''],
                                        'inputOptions' => ['class' => 'typical_input_bordered'],
                                        'options' => [
                                            'tag'=>'span'
                                        ],
                                    ],
                                ]); ?>
                                <?= $form->field($messageModel, 'senderID')->hiddenInput(['value' => $this->params['user']->id]) ?>
                                <?= $form->field($messageModel, 'receiverID')->hiddenInput(['value' => $item->id]) ?>
                                <?= $form->field($messageModel, 'text')
                                    ->textArea(['class' => 'typical_input_bordered user-send-message-field', 'style' => 'display: none;'])
                                ?>

                                <?php \yii\widgets\ActiveForm::end(); ?>
                                <a href="javascript:void(0)" class="green_btn user-send-message">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Отправить сообщение')?></span>
                                </a>
                                <?php if(!$this->params['user']->isFriend($item->id)):?>
                                <a href="javascript:void(0)" class="green_btn add_friend_link" data-customerID="<?= $this->params['user']->id?>" data-friendID="<?= $item->id?>">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Добавить в друзья')?></span>
                                </a>

                                <!--       add_friend_mod            -->

                                <div style="display: none;">
                                    <div class="box-modal add_friend_mod">
                                        <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                        <div class="modal">
                                            <h3><?= \Yii::t('app', 'Поздравляем')?>!</h3>
                                            <p><?= \Yii::t('app', 'Вы и')?> <?= $item->fullName?> <?= \Yii::t('app', 'теперь друзья')?>!</p>
                                            <div class="add_friend_mod_img">
                                                <a href="javascript:void(0)" class="add_friend_photo add_friend_photo_m">
                                                    <?php if (!empty($this->params['user']->mainImage)):?>
                                                        <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
                                                    <?php else:?>
                                                        <img src="/img/no-img-<?= $this->params['user']->sex?>.jpg" alt="">
                                                    <?php endif;?>
                                                </a>
                                                <!--                                                            <a href="#" class="add_friend_photo add_friend_photo_f"></a>-->
                                                <a href="javascript:void(0)" class="add_friend_photo">
                                                    <img src="/uploads/<?= $item->id?>/<?= $item->mainImage->file?>" alt="">
                                                </a>
                                            </div>
                                            <div class="add_friend_mod_social">
                                                <a href="javascript:void(0)" class="reg_soc_btn reg_soc_btn_tw"><?= \Yii::t('app', 'Поделиться')?></a>
                                                <a href="javascript:void(0)" class="reg_soc_btn reg_soc_btn_fb"><?= \Yii::t('app', 'Поделиться')?></a>
                                                <a href="javascript:void(0)" class="reg_soc_btn reg_soc_btn_vk"><?= \Yii::t('app', 'Поделиться')?></a>
                                                <a href="javascript:void(0)" class="reg_soc_btn reg_soc_btn_od"><?= \Yii::t('app', 'Поделиться')?></a>
                                                <a href="javascript:void(0)" class="reg_soc_btn reg_soc_btn_g"><?= \Yii::t('app', 'Поделиться')?></a>
                                                <a href="javascript:void(0)" class="reg_soc_btn reg_soc_btn_inst"><?= \Yii::t('app', 'Поделиться')?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>

                            </div>
                            <?php endif;?>
                        </div>
                        <?= $this->render('//public/block/profile/comment', ['comments' => $comments, 'pages' => $pages]); ?>
                    </div>
                    <div class="profile_aside">
                        <a href="javascript:void(0)" class="announcement_img avatar_mod_link">
                            <img src="/uploads/<?= $item->id?>/<?= $item->mainImage->file?>" alt="">
                        </a>

                        <!--       avatar_mod            -->

                        <!--       avatar_mod            -->
                        <div style="display: none;">
                            <div class="box-modal avatar_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="wall_post">
                                        <h3><?= \Yii::t('app', 'Мой аватар')?></h3>
                                        <div class="wall_post_top clearfix">
                                            <div class="wall_post_txt">
                                                            <span class="wall_post_img">
                                                                <img src="/uploads/<?= $item->id?>/<?= $item->mainImage->file?>" alt="">
                                                            </span>
                                                <div class="wall_post_links clearfix">
                                                    <div class="wall_post_links_left">
                                                        <p><?= $item->mainImage->date?></p>
                                                    </div>
                                                    <div class="wall_post_links_likes">
                                                        <span><?= $item->mainImage->likePoint?></span>
                                                        <a href="javascript:void(0)" class="like_btn"><?= \Yii::t('app', 'Нравится');?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="album_link"><?= \Yii::t('app', 'Фотоальбом')?></a>
                        <div class="partner_block">
                            <h3><?= \Yii::t('app', 'Ищу напарника')?></h3>
                            <ul>
                                <?php foreach ($item->ads as $ads):?>
                                    <li><a href="<?= Url::to('/public/ads/' . $ads->id)?>"><?= $ads->title ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="side_companies">
                            <h3><?= \Yii::t('app', 'Мои компании')?></h3>
                            <!-- companies_recomandations_item -->
                            <?php foreach ($item->companies as $company):?>
                            <div class="companies_recomandations_item side_companies_recomandations_item">
                                <a href="<?= Url::to('/public/company/' . $company->id)?>" class="title_link"><?= $company->title?></a>
                                <a href="<?= Url::to('/public/company/' . $company->id)?>" class="companies_recomandations_img">
                                    <img src="<?= $company->image?>" alt="">
                                    <span class="view_ic"></span>
                                </a>
                                <div class="recent_search_item_btm">
                                    <span class="recent_search_item_btm_txt"><?= \Yii::t('app', 'Участник')?></span>
                                    <div class="group_number_block"><span class="group_number"><?= $company->participantsCount?></span></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="company_participants">
                            <h3><?= \Yii::t('app', 'Мои друзья')?></h3>
                            <div class="company_participants_links">
                                <?php foreach ($item->friends as $friend):?>
                                    <a href="<?= Url::to('/public/profile/' . $friend->id)?>" class="company_participant_it">
                                        <img src="/uploads/<?= $friend->id?>/<?= $friend->mainImage->file?>" alt="">
                                    </a>
                                <?php endforeach;?>
                            </div>
                            <a href="javascript:void(0)" class="prof_all_link"><?= \Yii::t('app', 'Все друзья')?> (118)</a>

                        </div>
                        <div class="profile_interests_block">
                            <h3><?= \Yii::t('app', 'Интересы')?></h3>
                            <div class="companies_recomandations_item_tags">
                                <?php foreach ($item->interests as $interest):?>
                                    <a href="javascript:void(0)" class="grey_tag"><?= $interest->translation->name?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="decorations_settings">
                            <span class="dec_set_right_1">
                                <img src="/img/decor/decor_prof_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
