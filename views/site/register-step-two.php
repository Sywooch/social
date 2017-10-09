<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="title_block step_title_block clearfix">
            <h1><span><?= \Yii::t('app', 'Шаг')?> 2:</span> <?= \Yii::t('app', 'Расскажите немного о себе, Имя')?></h1>
        </div>

        <div class="step_block">
            <div class="step_block_avatar">
                <h3><?= \Yii::t('app', 'Необходимо выбрать фото профиля')?></h3>
                <div class="wrap_step_block_ava">
                    <div class="step_photo_top">
                        <div class="step_photo_i_img">
                        </div>
                    </div>
                    <div class="green_btn">
                        <input type="file" class="styler" data-name="CustomerImage[image]" onchange="ImageUploader.load(this)" multiple="">
                    </div>
                </div>
            </div>
            <?php $form = ActiveForm::begin([
                'action' => '/site/register-complete',
                'enableAjaxValidation' => false,
                'options' =>
                    [
                        'id' => 'step-two-form',
                        'class'=>'row',
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
            <div class="interests_block">
                <h3><?= \Yii::t('app', 'Мои интересы')?></h3>
                <div class="wrap_categories clearfix">
                    <?php if (!empty($interestCategories)):?>
                    <ul class="categories_list">
                        <?php foreach ($interestCategories as $key => $category):?>
                        <li class="categories_list_pull categories_list_pull_<?= $key + 1?>"><?= $category['translation']['name']?></li>
                        <?php endforeach;?>
                    </ul>

                    <div class="categories_hidden">
                        <?php foreach ($interestCategories as $key => $category):?>
                        <div class="category_item category_item_<?= $key + 1?>">
                            <h4><?= $category['translation']['name']?></h4>
                            <?php if (!empty($category['interests'])):?>
                            <ul class="filter_chbx_orange">
                                <?php foreach ($category['interests'] as $interest):?>
                                <li>
                                    <label>
                                        <input type="checkbox" class="styler" name="interests[]" value="<?= $interest['id']?>">
                                        <span><?= $interest['translation']['name']?></span>
                                    </label>
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif;?>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
            </div>

            <?php if (!empty($languages)):?>
            <div class="step_languages step_languages_type2">
                <h3><?= \Yii::t('app', 'Знаю языки')?></h3>
                <ul>
                    <?php foreach ($languages as $language):?>
                        <li>
                            <a href="javascript:void(0)"><?= $language['translation']['name']?></a>
                            <button class="delete_btn"><i class="flaticon-close-cross"></i></button>
                        </li>
                    <?php endforeach;?>
                </ul>
                <div class="typical_select_bordered">
                    <select name="language">
                        <option value=""><?= \Yii::t('app', 'Добавить язык')?></option>
                        <?php foreach ($languages as $language):?>
                            <option value="<?= $language['id']?>"><?= $language['translation']['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <?php endif;?>
            <div class="step_info_btm step_info_btm_type_2">
                <h3><?= \Yii::t('app', 'О себе')?></h3>
                <div class="step_info_form clearfix">
                    <?= $form->field(new \app\models\Customer(), 'about')->textArea(['class' => 'typical_input_bordered']) ?>
                    <div class="green_bg_hint">
                        <p><?= \Yii::t('app', 'Обязательно напишите о себе')?></p>
                        <p><?= \Yii::t('app', 'Это поможет другим лучше узнать вас')?>!</p>
                    </div>

                </div>
                <p class="form_mistake_txt"><?= \Yii::t('app', 'Не ленитесь, напишите хоть что-нибудь')?> :)</p>
                <div class="green_btn">
                    <?= Html::submitButton(\Yii::t('app', 'Зарегистрироваться'), ['class' => 'green_btn_txt']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
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
