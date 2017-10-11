<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<header>
    <div class="full_width_container clearfix">
        <?php if (empty($this->params['user'])):?>
        <div class="login_head">
            <?php $form = ActiveForm::begin([
                'action' => '/site/login',
                'enableAjaxValidation' => true,
                'options'=>['class'=>'row'],
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
                <button class="head_form_link">Забыли пароль?</button>
                <div class="popup_password popup_password_main">
                    <h4>Напоминание пароля</h4>
                    <form>
                        <div class="pass_line">
                            <input type="email" class="typical_input_bordered" placeholder="Ваш E-mail" />
                            <span class="blue_btn close_password popup_pass_mist_pull">Отправить</span>
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
                    <h4>Напоминание пароля</h4>
                    <form>
                        <div class="pass_line">
                            <input type="email" class="typical_input_bordered" value="vasja@yand" />
                            <span class="blue_btn close_password popup_pass_res_pull">Отправить</span>
                        </div>
                        <div class="capcha_line">
                                     <span class="capcha_img">
                                         <img src="/img/capcha.jpg" alt="">
                                     </span>
                            <input type="text" class="typical_input_bordered" />
                        </div>
                        <p class="form_mistake_txt">Пользователь с таким E-mail не найден</p>
                    </form>
                    <button class="close_btn close_password"><i class="flaticon-close"></i></button>
                </div>
                <div class="popup_password popup_password_result">
                    <h4>Пароль успешно отправлен на  vasja@yandex.ru</h4>
                    <span class="blue_btn close_password">ОК</span>
                    <button class="close_btn close_password"><i class="flaticon-close"></i></button>
                </div>
            </div>
        </div>
        <?php else:?>
        Привет, <a href="<?= Url::to('/profile')?>">
            <?= !empty($this->params['user']->fullName) ? $this->params['user']->fullName : $this->params['user']->email?>
            </a>
            <a href="<?= Url::to('site/logout')?>"><?= \Yii::t('app', 'Выйти')?></a>
        <?php endif;?>
        <div class="languages_head">
            <ul class="language-select">
                <li class="active" data-lang="ru">
                    <img src="/img/flags/ru.svg"  class="lang_h_flag" alt="">
                    Русский
                </li>
                <li data-lang="gb">
                    <img src="/img/flags/gb.svg"  class="lang_h_flag" alt="">
                    English
                </li>
                <li data-lang="de">
                    <img src="/img/flags/de.svg"  class="lang_h_flag" alt="">
                    Deutsch
                </li>
            </ul>
        </div>
    </div>
</header>
