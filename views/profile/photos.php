<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$js = "
                                    $('.add_button').on('click', function () {
                                        $('.add-input').trigger('click');
                                    });

    ImageUploader.params.onLoadImage = function () {
        ImageUploader.uploadQueueStart(function ()
        {
            location.reload();
        });
    }
";
$this->registerJs($js);
?>

<?= $this->render('//site/block/search', []); ?>
<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

<div class="content">
    <div class="title_block clearfix">
        <h1><?= \Yii::t('app', 'Мои фотографии');?></h1>
        <input type="file" class="add-input" data-name="CustomerImage[image]" data-url="/ajax/image-upload-profile"
               onchange="ImageUploader.load(this)" multiple="" style="display: none;">
        <a href="javascript:void(0);" class="add_button"><?= \Yii::t('app', 'Загрузить фото');?></a>
    </div>
    <div class="profile_photos clearfix">
        <?php if (!empty($user->images)):?>
            <?php foreach ($user->images as $image):?>
            <div class="profile_photo_item">
            <a href="javascript:void(0)" class="profile_photo_item_visible">
                <span class="item_hint"><?= date('d.m.Y', strtotime($image->date))?></span>
                <span class="prof_p_item_img">
                                           <img src="/uploads/<?= $user->id?>/<?= $image->file?>" alt="">
                                           <span class="view_ic view_ic_loop"></span>
                                       </span>
                <span class="comments_tag"><?= count($image->comments)?></span>
                <span class="likes_tag"><?= $image->likePoint?></span>
            </a>
            <!--       profile_photo_mod            -->

            <div style="display: none;">
                <div class="box-modal profile_photo_mod">
                    <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                    <div class="modal">
                        <div class="wall_post">
                            <h3><?= date('d.m.Y', strtotime($image->date))?></h3>
                            <div class="wall_post_top clearfix">
                                <div class="wall_post_txt">
                                                           <span class="wall_post_img">
                                                               <img src="/uploads/<?= $user->id?>/<?= $image->file?>" alt="">
                                                           </span>
                                    <div class="wall_post_links clearfix">
                                        <div class="wall_post_links_left">
                                            <a href="<?= Url::to('/profile')?>" class="wall_post_author"><?= $user->fullName?></a>
                                        </div>
                                        <div class="wall_post_links_likes">
                                            <span><?= $image->likePoint?></span>
                                            <a href="javascript:void(0)" class="like_btn"><?= \Yii::t('app', 'Нравится');?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wall_comments">
<!--                                <button class="wall_comments_btn">--><?//= \Yii::t('app', 'Показать 10 комментариев')?><!--</button>-->
                                <div class="modal_comments">
                                    <?php foreach ($image->comments as $element):?>
                                    <div class="wall_comment_item clearfix">
                                        <a href="<?= Url::to('/public/user/' . $element->customerID)?>" class="profile_photo_link">
                                            <img src="/uploads/<?= $element->customer->id?>/<?= $element->customer->mainImage->file?>" alt="">
                                        </a>
                                        <div class="wall_comment_item_txt">
                                            <div class="typical_tooltip wall_tooltip">
                                                <span class="tooltip-item"><i class="flaticon-more"></i></span>
                                                <div class="tooltip-content clearfix">
                                                    <ul>
                                                        <li><a href="javascript:void(0)"><?= \Yii::t('app', 'Заблокировать пользователя');?> </a></li>
                                                        <li><a href="javascript:void(0)"><?= \Yii::t('app', 'Удалить комментарий');?></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="wall_comment_title"><?= $element->customer->fullName?></a>
                                            <p><?= $element->text?></p>
                                            <div class="wall_post_links clearfix">
                                                <div class="wall_post_links_left">
                                                    <p><?= \Yii::$app->formatter->asDate($element->date, 'd MMMM yyyy') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach;?>

                                    <div class="wall_comment_item clearfix">
                                        <a href="#" class="profile_photo_link">
                                            <img src="/uploads/<?= $user->id?>/<?= $user->mainImage->file?>" alt="">
                                        </a>
                                        <div class="wall_comment_item_txt">
                                            <div class="wall_comment_input">
                                                <?php $form = ActiveForm::begin([
                                                    'action' => '',
                                                    'enableAjaxValidation' => false,
                                                    'options' =>
                                                        [
                                                            'id' => 'step-two-form',
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
                                                <?= $form->field($comment, 'customerID')->hiddenInput(['value' => $user->id]) ?>
                                                <?= $form->field($comment, 'imageID')->hiddenInput(['value' => $image->id]) ?>
                                                <?= $form->field($comment, 'text')
                                                    ->textArea(['class' => 'typical_input_bordered', 'placeholder' => \Yii::t('app', 'Ваш комментарий')]) ?>

                                                <?= Html::submitButton(\Yii::t('app', 'Отправить'), ['class' => 'typical_link']) ?>
                                                <?php ActiveForm::end(); ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <?php endforeach;?>
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
