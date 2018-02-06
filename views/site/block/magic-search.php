<?php
use app\components\Registry;

$searchForm = new \app\models\SearchForm();
?>
<div class="main_page_btm">
    <div class="container">
        <h2><?= \Yii::t('app', 'Найди прямо сейчас')?></h2>
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
            <?= $form->field($searchForm, 'text')->textInput(['placeholder' => \Yii::t('app', 'Волшебный поиск')]) ?>
            <div class="orange_btn">
                <input type="submit" class="orange_btn_txt" value="<?= \Yii::t('app', 'Искать')?>" />
            </div>
            <div class="search_hidden">
                <div class="search_hidden_line">
                    <a href="#" class="search_hidden_txt">Выгуливание жены</a>
                </div>
            </div>
        </div>
        <div class="tags_block">
            <?php foreach ($interests as $key => $interest):?>
                <?php if ($key == \Yii::$app->params['mainInterestsElements']) break;?>
                <a href="javascript:void(0)" class="white_tag" data-id="<?= $interest->id?>"><?= $interest->translation->name?></a>
            <?php endforeach;?>

            <?php if (count($interests) > \Yii::$app->params['mainInterestsElements']):?>
            <button class="white_tags_pull" type="button"><?= \Yii::t('app', 'Еще ')?><?= count($interests) - \Yii::$app->params['mainInterestsElements']?></button>
            <?php endif;?>
            <div class="tags_block_hidden">
                <div class="tags_block_hidden_wrap">
                    <?php foreach ($interests as $key => $interest):?>
                        <?php if ($key < \Yii::$app->params['mainInterestsElements']) continue;?>
                        <a href="javascript:void(0)" class="white_tag" data-id="<?= $interest->id?>"><?= $interest->translation->name?></a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="main_btm_chbx">
            <ul class="white_chbx">
                <li>
                    <label>
                        <input type="radio" name="SearchForm[cityCheckbox]" class="styler" value="0" checked>
                        <span><?= \Yii::t('app', 'В моем городе')?></span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="SearchForm[cityCheckbox]" class="styler" value="1">
                    </label>
                    <div class="white_select">
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
                </li>
                <li>
                    <label>
                        <input type="radio" name="SearchForm[type]" value="ads" class="styler">
                        <span><?= \Yii::t('app', 'Напарник')?></span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="SearchForm[type]" value="company" class="styler">
                        <span><?= \Yii::t('app', 'Компания')?></span>
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="SearchForm[type]" value="all" class="styler" checked>
                        <span><?= \Yii::t('app', 'Не важно')?></span>
                    </label>
                </li>
            </ul>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>