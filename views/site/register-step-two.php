<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="title_block step_title_block clearfix">
            <h1><span><?= \Yii::t('app', 'Шаг')?> 2:</span> <?= \Yii::t('app', 'Информация обо мне')?></h1>
        </div>
        <div class="step_block">
            <?php $form = ActiveForm::begin([
                'action' => '/site/register-step-three',
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
                            <li class="categories_list_pull categories_list_pull_<?= $category['id']?>"><?= $category['translation']['name']?></li>
                        <?php endforeach;?>
                        <li class="categories_list_pull"><a class="category_modal_link"  onclick="$('.goal_modal').arcticmodal()"><?= \Yii::t('app', 'Добавьте свою')?></a></li>
                    </ul>
                    <div class="categories_hidden">
                        <div class="main_search interests_search interests_search_right">
                            <input type="text" class="white_input interest-search" placeholder="<?= \Yii::t('app', 'Волшебный поиск')?>" />
                            <input type="button" class="search_btn"/>
                            <div class="search_hidden">
                                <div class="search_hidden_line_interest list">
                                </div>
                                <div class="search_hidden_line_interest">
                                    <a class="category_modal_link"  onclick="$('.goal_modal').arcticmodal()"><?= \Yii::t('app', 'Добавьте свою')?></a>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($interestCategories as $key => $category):?>
                        <div class="category_item category_item_<?= $category['id']?>">
                            <h4><?= $category['translation']['name']?></h4>
                            <?php if (!empty($category['interests'])):?>
                            <ul class="filter_chbx_orange">
                                <?php foreach ($category['interests'] as $interest):?>
                                <li>
                                    <label class="interest-label item-<?= $interest['id']?>">
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
                    <!--       goal_modal            -->

                    <div style="display: none;">
                        <div class="box-modal goal_modal">
                            <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                            <div class="modal">
                                <div class="goal_mod">
                                    <h4><?= \Yii::t('app', 'Добавление интересов')?></h4>
                                    <textarea class="typical_input_bordered" placeholder="<?= \Yii::t('app', 'Перечислите через запятую')?>"></textarea>
                                    <div class="green_btn">
                                        <input type="submit" class="green_btn_txt" value="<?= \Yii::t('app', 'Добавить')?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($languages)):?>
            <div class="step_languages">
                <h3><?= \Yii::t('app', 'Знаю языки')?></h3>
                <ul class="language-selector-block">
                    <li class="language-selector-li">
                        <div class="inner_search_select">
                            <select class="language-selector">
                                <option value=""><?= \Yii::t('app', 'Добавить язык')?></option>
                                <?php foreach ($languages as $language):?>
                                    <option value="<?= $language['id']?>"><?= $language['translation']['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
            <?php endif;?>
            <div class="step_info_btm">
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
