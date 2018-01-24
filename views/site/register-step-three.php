<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="title_block step_title_block clearfix">
            <h1><span><?= \Yii::t('app', 'Шаг')?> 3:</span> <?= \Yii::t('app', 'Добавь свое фото и всё')?>!</h1>
        </div>
        <div class="step_block">
            <div class="step_photos">
                <div class="step_photo_item">
                    <div class="step_photo_top image-1">
                        <div class="step_photo_i_img">
                            <img src="/img/step1.jpg" alt="">
                        </div>
                        <div class="green_btn">
                            <input type="file" class="styler" data-name="CustomerImage[image]" data-url="/ajax/image-upload" onchange="ImageUploader.load(this, 'image-1')" multiple="">
                        </div>
                    </div>
                    <p><?= \Yii::t('app', 'Это я')?>!</p>
                </div>
                <div class="step_photo_item">
                    <div class="step_photo_top image-2">
                        <div class="step_photo_i_img">
                            <img src="/img/step2.jpg" alt="">
                        </div>
                        <div class="green_btn">
                            <input type="file" class="styler" data-name="CustomerImage[image]" data-url="/ajax/image-upload" onchange="ImageUploader.load(this, 'image-2')" multiple="">
                        </div>
                    </div>
                    <p><?= \Yii::t('app', 'Мой аватар')?></p>
                </div>
                <div class="step_photo_item">
                    <div class="step_photo_top image-3">
                        <div class="step_photo_i_img">
                            <img src="/img/step3.jpg" alt="">
                        </div>
                        <div class="green_btn">
                            <input type="file" class="styler" data-name="CustomerImage[image]" data-url="/ajax/image-upload" onchange="ImageUploader.load(this, 'image-3')" multiple="">
                        </div>
                    </div>
                    <p><?= \Yii::t('app', 'Это тоже я')?> :)</p>
                </div>
            </div>
            <div class="step_btm">
                <a href="<?= \yii\helpers\Url::to('/site/register-complete')?>" class="green_btn complete-registration">
                    <span class="green_btn_txt"><?= \Yii::t('app', 'Зарегистрироваться')?></span>
                </a>
            </div>
        </div>
        <div class="decorations_steps">
                        <span class="dec_steps_left_1">
                            <img src="/img/decor/decor_steps_l_1.png" alt="">
                        </span>
            <span class="dec_steps_right_1">
                            <img src="/img/decor/decor_steps_r_1.png" alt="">
                        </span>
        </div>
    </div>
</section>
