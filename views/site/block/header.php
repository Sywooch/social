<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<?php if (!empty($this->params['user'])):?>
<header class="logged_header">
    <?php else:?>
    <header>
    <?php endif;?>
    <div class="full_width_container clearfix">
        <?php if (empty($this->params['user'])):?>
        <div class="login_head">
            <?php $form = ActiveForm::begin([
                'action' => '/site/login',
                'enableAjaxValidation' => true,
                'options'=>['class'=>'row', 'style' => 'display: initial;'],
                'fieldConfig' => [
                    'template' => '{input}{error}',
                    'errorOptions' => ['tag'=>'span', 'class' => 'error text-danger'],
                    'labelOptions' => ['class' => ''],
                    'inputOptions' => ['class' => 'white_input'],
                    'options' => [
                        'tag'=>'span'
                    ],
                ],
            ]); ?>
            <?= $form->field($this->params['login'], 'email')->textInput([
                'placeholder' => 'E-mail',
            ]) ?>

            <?= $form->field($this->params['login'], 'password')->passwordInput([
                'placeholder' => 'Пароль',
            ]) ?>

            <div class="white_chbx">
                <label>
                    <input type="checkbox" class="styler" />
                    <span><?= \Yii::t('app', 'Запомнить')?></span>
                </label>
            </div>
            <?= Html::submitButton(\Yii::t('app', 'Войти'), ['class' => 'white_btn']) ?>
            <?php ActiveForm::end(); ?>
            <div class="pass_recovery_head">
                <button class="head_form_link"><?= \Yii::t('app', 'Забыли пароль')?>?</button>
                <div class="popup_password popup_password_main">
                    <h4><?= \Yii::t('app', 'Напоминание пароля')?></h4>
                    <form>
                        <div class="pass_line">
                            <input type="email" class="typical_input_bordered" placeholder="Ваш E-mail" />
                            <span class="blue_btn close_password popup_pass_mist_pull"><?= \Yii::t('app', 'Отправить')?></span>
                        </div>
                        <div class="capcha_line">
                                     <span class="capcha_img">
                                         <img src="/img/capcha.jpg" alt="">
                                     </span>
                            <input type="text" class="typical_input_bordered" />
                        </div>
                    </form>
                    <button class="close_btn close_password"><i class="flaticon-close"></i></button>
                </div>
                <div class="popup_password popup_password_mistake">
                    <h4><?= \Yii::t('app', 'Напоминание пароля')?></h4>
                    <form>
                        <div class="pass_line">
                            <input type="email" class="typical_input_bordered" value="vasja@yand" />
                            <span class="blue_btn close_password popup_pass_res_pull"><?= \Yii::t('app', 'Отправить')?></span>
                        </div>
                        <div class="capcha_line">
                                     <span class="capcha_img">
                                         <img src="/img/capcha.jpg" alt="">
                                     </span>
                            <input type="text" class="typical_input_bordered" />
                        </div>
                        <p class="form_mistake_txt"><?= \Yii::t('app', 'Пользователь с таким E-mail не найден')?></p>
                    </form>
                    <button class="close_btn close_password"><i class="flaticon-close"></i></button>
                </div>
                <div class="popup_password popup_password_result">
                    <h4><?= \Yii::t('app', 'Пароль успешно отправлен на')?>  vasja@yandex.ru</h4>
                    <span class="blue_btn close_password"><?= \Yii::t('app', 'ОК')?></span>
                    <button class="close_btn close_password"><i class="flaticon-close"></i></button>
                </div>
            </div>
        </div>
        <?php else:?>
            <div class="login_head">
                <a href="<?= Url::to('/profile')?>" class="login_profile">
                    <?= !empty($this->params['user']->fullName) ? $this->params['user']->fullName : $this->params['user']->email?>
                </a>
                <a href="<?= Url::to('/site/logout')?>" class="log_out_btn"></a>
            </div>
        <?php endif;?>
        <div class="languages_head">
            <ul class="language-select">
                <?php foreach (\app\components\Registry::get('languages') as $language):?>
                <li class="<?= ($language['code'] == \Yii::$app->language) ? 'active' : '' ?>" data-lang="<?= $language['code']?>">
                    <img src="/img/flags/<?= $language['code']?>.svg"  class="lang_h_flag" alt="">
                    <a href="<?php echo Url::to([Yii::$app->request->url, 'language' => $language['code']]);?>">
                        <?= $language['name']?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</header>
