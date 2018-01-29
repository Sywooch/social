<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$registration = new \app\models\RegisterForm();
?>

<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="title_block clearfix">
            <h1><?= \Yii::t('app', 'Пожалуйста, авторизуйтесь')?></h1>
        </div>
        <div class="enter_block">
            <div class="enter_item">
                <h2><?= \Yii::t('app', 'Вход')?></h2>
                <?php $form = ActiveForm::begin([
                    'action' => '/site/login',
                    'enableAjaxValidation' => true,
                    'options'=>['class'=>'row'],
                    'fieldConfig' => [
                        'template' => '{input}{error}',
                        'errorOptions' => ['tag'=>'span', 'class' => 'error text-danger'],
                        'labelOptions' => ['class' => ''],
                        'inputOptions' => ['class' => 'typical_input_bordered'],
                        'options' => [
                            'tag'=>'span'
                        ],
                    ],
                ]); ?>
                <div class="enter_form_reg">
                    <?= $form->field($this->params['login'], 'email')->textInput([
                        'placeholder' => 'Эл.почта',
                    ]) ?>

                    <?= $form->field($this->params['login'], 'password')->passwordInput([
                        'placeholder' => 'Пароль',
                    ]) ?>

                    <div class="reg_sex">
                        <ul class="typical_chbx_orange">
                            <li>
                                <label>
                                    <input type="checkbox" class="styler">
                                    <span><?= \Yii::t('app', 'Запомнить меня')?></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="green_btn">
                        <?= Html::submitButton(\Yii::t('app', 'Войти'), ['class' => 'green_btn_txt']) ?>
                    </div>
                    <a href="#" class="enter_forg_pass"><?= \Yii::t('app', 'Забыли пароль?')?></a>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="enter_item">
                <h2><?= \Yii::t('app', 'Вход через соц.сети')?></h2>
                <div class="enter_social">
                    <a href="<?= $this->params['twitter']->url("oauth/authorize", ["oauth_token" => Yii::$app->params['social']['twitter']['access_token']])?>" class="reg_soc_btn reg_soc_btn_tw"><?= \Yii::t('app', 'Twitter')?></a>
                    <a href="<?= $this->params['facebook']->getRedirectLoginHelper()->getLoginUrl('http://' . Yii::$app->getRequest()->serverName . '/social/facebook', ['email'])?>"
                       class="reg_soc_btn reg_soc_btn_fb"><?= \Yii::t('app', 'Facebook')?></a>
                    <a href="<?= $this->params['vk']->getLoginUrl()?>" class="reg_soc_btn reg_soc_btn_vk"><?= \Yii::t('app', 'Вконтакте')?></a>
                    <a href="#" class="reg_soc_btn reg_soc_btn_od"><?= \Yii::t('app', 'Одноклассники')?></a>
                </div>
            </div>
            <a href="<?= $this->params['facebook']->getRedirectLoginHelper()->getLoginUrl('http://' . Yii::$app->getRequest()->serverName . '/social/facebook', ['email'])?>">
                <img src="/img/login-fb.png" alt="">
            </a>
            <a href="<?= $this->params['vk']->getLoginUrl()?>">
                <img src="/img/login-vk.png" alt="">
            </a>
            <div class="enter_item">
                <h2><?= \Yii::t('app', 'Регистрация')?></h2>
                <div class="enter_form_reg">
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
                    <?= $form->field($registration, 'name')->textInput(['placeholder' => \Yii::t('app', 'Имя')])->label(false) ?>

                    <?= $form->field($registration, 'email')->textInput(['placeholder' => \Yii::t('app', 'Эл.почта')])->label(false) ?>

                    <?= $form->field($registration, 'password')->passwordInput(['placeholder' => \Yii::t('app', 'Пароль')])->label(false) ?>

                    <div class="typical_select_bordered">
                        <?= $form->field($registration, 'city')
                            ->dropDownList(\yii\helpers\ArrayHelper::merge($countriesGroup, ['else' => \Yii::t('app', 'Другой город...')]), ['class' => 'city-selector'])
                            ->label(false);?>
                    </div>

                    <div class="typical_birth_date">
                        <button class="birth_date_pull" name="err"><?= \Yii::t('app', 'День рождения')?></button>
                        <div class="birth_date_hidden">
                            <div class="birth_date_coll birth_date_day typical_scroll">
                                <ul class="birht_date_chbx">
                                    <?php for ($i = 1; $i <= 31; $i++):?>
                                    <li>
                                        <label>
                                            <input type="radio" class="styler" name="b_day" value="<?= $i?>">
                                            <span data-numeric="<?= $i?>" ><?= $i?></span>
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
                                            <input type="radio" class="styler" name="b_month" value="<?= $numeric?>">
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
                                                <input type="radio" class="styler" name="b_year" value="<?= $i?>">
                                                <span data-numeric="<?= $i?>" ><?= $i?></span>
                                            </label>
                                        </li>
                                    <?php endfor;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?= $form->field($registration, 'birthday')->hiddenInput()->label(false) ?>
                    <div class="reg_sex">
                        <ul class="typical_chbx_orange">
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
                    <div class="green_btn">
                        <?= Html::submitButton(\Yii::t('app', 'Зарегистрироваться'), ['class' => 'green_btn_txt']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
