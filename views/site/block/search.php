<?php
use app\components\Registry;

$searchForm = new \app\models\SearchForm();
?>
<section class="inner_header">
    <div class="full_width_container clearfix">
        <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
        <div class="inner_header_search">
            <?php $form = \yii\widgets\ActiveForm::begin([
                'action' => '/search',
                'enableAjaxValidation' => false,
                'options' => [
                    'class' => 'row',
                    'id' => 'magic-search-form'
                ],
                'fieldConfig' => [
                    'template' => '{input}',
                    'inputOptions' => ['class' => 'white_input'],
                    'options' => [
                        'tag'=>'span'
                    ],
                ],
            ]); ?>
            <div class="main_search">
                <input type="hidden" name="SearchForm[cityCheckbox]" value="1" />
                <?= $form->field($searchForm, 'text')->textInput(['class' => 'white_input', 'placeholder' => \Yii::t('app', 'Волшебный поиск')]) ?>
                <div class="orange_btn">
                    <input type="submit" class="orange_btn_txt" value="<?= \Yii::t('app', 'Искать')?>" />
                </div>
<!--                <div class="search_hidden">-->
<!--                    <div class="search_hidden_line">-->
<!--                        <a href="#" class="search_hidden_txt">Выгуливание жены</a>-->
<!--                    </div>-->
<!--                    <div class="search_hidden_line">-->
<!--                        <a href="#" class="search_hidden_txt">Выгуливание жены</a>-->
<!--                    </div>-->
<!--                    <div class="search_hidden_line">-->
<!--                        <a href="#" class="search_hidden_txt">Выгуливание жены</a>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div class="inner_search_btm_line">
                <div class="inner_search_select">
                    <?= $form->field($searchForm, 'city')
                        ->dropDownList(
                            \yii\helpers\ArrayHelper::merge(
                                [Registry::get('citySearch')->id => Registry::get('citySearch')->area->country->translation->name . ', ' . Registry::get('citySearch')->translation->name],
                                (new \app\models\City())->getCountriesGroup(),
                                ['else' => \Yii::t('app', 'Другой город...')]
                            ),
                            ['class' => 'city-selector',])
                        ->label(false);?>
                </div>
                <ul class="typical_chbx_orange">
                    <li>
                        <label>
                            <input type="checkbox" name="SearchForm[type][]" class="styler" value="ads" checked>
                            <span><?= \Yii::t('app', 'Напарник')?></span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" name="SearchForm[type][]" class="styler" value="companies" checked>
                            <span><?= \Yii::t('app', 'Компания')?></span>
                        </label>
                    </li>
                </ul>
                <div class="inner_head_links">
                    <a href="javascript:void(0)">
                        <span><?= \Yii::t('app', 'Обьявления')?></span>
                        <span class="green_tag"><?= \app\models\Ads::find()->count()?></span>
                    </a>
                    <a href="javascript:void(0)">
                        <span><?= \Yii::t('app', 'Компании')?></span>
                        <span class="green_tag"><?= \app\models\Company::find()->count()?></span>
                    </a>
                </div>
            </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
</section>
