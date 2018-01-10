<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?= $this->render('//site/block/search', []); ?>
<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

            <div class="content">
                <div class="title_block clearfix">
                    <h1><?= $item->name?></h1>
                </div>
                <div class="profile_page clearfix">
                    <div class="profile_block">
                        <div class="profile_block_top">
                            <div class="profile_quote">
                                <p><?= $item->title?></p>
                            </div>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'Страна, Город')?></td>
                                    <td> <?= $item->city->country->translation->name?>, <?= $item->city->translation->name?></td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'Языки')?></td>
                                    <td><?php echo implode(', ', $item->customer->languagesList)?></td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'Описание')?></td>
                                    <td><?= $item->description?></td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="profile_block_top_btns">
                                <?php if (!empty($this->params['user']->id)):?>
                                <a href="javascript:void(0)" class="green_btn" onclick="$('.message-send').show()">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Отправить сообщение')?></span>
                                </a>
                                <?php endif;?>
                                <?php if (!empty($this->params['user']->id) && $this->params['user']->id != $item->customer->id):?>
                                <a href="javascript:void(0)" class="green_btn">
                                    <span class="green_btn_txt"><?= \Yii::t('app', 'Вступить в компанию')?></span>
                                </a>
                                <?php endif;?>
                            </div>
                        </div>
                        <?= $this->render('//profile/block/company/comment', ['comments' => $comments, 'pages' => $pages]); ?>
                    </div>
                    <div class="profile_aside">
                        <a href="javascript:void(0)" class="announcement_img">
                            <img src="<?= $item->image?>" alt="">
                        </a>
                        <div class="company_participants">
                            <h3><?= \Yii::t('app', 'Участники')?> <span>(<?= $item->participantsCount?>)</span></h3>
                            <?php if (!empty($item->participants)):?>
                            <div class="company_participants_links">
                                <?php foreach ($item->participants as $participant):?>
                                    <a href="<?= Url::to('/public/profile/' . $participant->id)?>" class="company_participant_it">
                                        <img src="/uploads/<?= $participant->id?>/<?= $participant->mainImage->file?>" alt="">
                                    </a>
                                <?php endforeach;?>
                            </div>
                            <a href="javascript:void(0);" class="prof_all_link"><?= \Yii::t('app', 'Все участники')?></a>
                            <?php endif;?>
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