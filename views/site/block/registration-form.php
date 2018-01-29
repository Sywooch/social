<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$registration = new \app\models\RegisterForm();
?>
<div class="registration_form">
    <?php $form = ActiveForm::begin([
        'action' => '/site/register-step-two',
        'enableAjaxValidation' => true,
        'options'=>['class'=>'row'],
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
    <div class="reg_form_top">
        <?= $form->field($registration, 'name')
            ->textInput([
                    'placeholder' => \Yii::t('app', 'Имя'),
                    'class' => 'typical_input'
            ])
            ->label(false) ?>
        <?= $form->field($registration, 'email')->textInput(['placeholder' => \Yii::t('app', 'Эл.почта'),'class' => 'typical_input'])->label(false) ?>
        <?= $form->field($registration, 'password')->passwordInput(['placeholder' => \Yii::t('app', 'Пароль'),'class' => 'typical_input'])->label(false) ?>
        <div class="typycal_select">
            <?= $form->field($registration, 'city')
                ->dropDownList(\yii\helpers\ArrayHelper::merge((new \app\models\City())->getCountriesGroup(), ['else' => \Yii::t('app', 'Другой город...')]), ['class' => 'city-selector'])
                ->label(false);?>
        </div>
        <div class="typical_birth_date">
            <button class="birth_date_pull"><?= \Yii::t('app', 'День рождения')?></button>
            <div class="birth_date_hidden">
                <div class="birth_date_coll birth_date_day typical_scroll">
                    <ul class="birht_date_chbx">
                        <?php for ($i = 1; $i <= 31; $i++):?>
                        <li>
                            <label>
                                <input type="radio" class="styler"  name="b_day">
                                <span data-numeric="<?= $i?>"><?= $i?></span>
                            </label>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
                <div class="birth_date_coll birth_date_coll_month typical_scroll">
                    <ul class="birht_date_chbx">
                        <?php foreach (\app\models\RegisterForm::getMonthTranslation() as $numeric => $translation):?>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="b_month">
                                <span data-numeric="<?= $numeric?>"><?= $translation?></span>
                            </label>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="birth_date_coll birth_date_coll_year typical_scroll">
                    <ul class="birht_date_chbx">
                        <?php for ($i = 1980; $i <= 2012; $i++):?>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="b_year">
                                <span data-numeric="<?= $i?>"><?= $i?></span>
                            </label>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>
        <?= $form->field($registration, 'birthday')->hiddenInput()->label(false) ?>
        <div class="reg_sex">
            <ul>
                <li>
                    <label>
                        <input type="radio" class="styler" name="RegisterForm[sex]" value="1" checked>
                        <span><?= \Yii::t('app', 'Муж')?></span>
                    </label>

                </li>
                <li>
                    <label>
                        <input type="radio" class="styler" name="RegisterForm[sex]" value="2">
                        <span><?= \Yii::t('app', 'Жен')?></span>
                    </label>
                </li>
            </ul>
        </div>
    </div>
    <div class="green_btn">
        <?= Html::submitButton(\Yii::t('app', 'Зарегистрироваться'), ['class' => 'green_btn_txt']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>