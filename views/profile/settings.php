<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
<?= $this->render('//site/block/search', []); ?>
<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

            <div class="content">
                <div class="title_block clearfix">
                    <h1><?= \Yii::t('app', 'Мои настройки');?></h1>
                </div>
                <div class="profile_settings_tabs">
                    <div class="tabs">
                        <span class="tab current"><?= \Yii::t('app', 'Общие');?></span>
                        <span class="tab"><?= \Yii::t('app', 'Приватность');?></span>
                        <span class="tab"><?= \Yii::t('app', 'Безопасность');?></span>
<!--                        <span class="tab">--><?//= \Yii::t('app', 'Платежи');?><!--</span>-->
                    </div>
                    <div class="profile_settings_tabs_content">
                        <div class="box visible">
                            <div class="profile_settings_tabs_title">
                                <h4><?= \Yii::t('app', 'Изменить пароль');?></h4>
                            </div>
                            <div class="pass_change_block">
                                <div class="pass_change_form">
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
                                            'template' => '{label}{input}{error}',
                                            'errorOptions' => ['class' => 'error text-danger'],
                                            'labelOptions' => ['class' => 'input_title'],
                                            'inputOptions' => ['class' => 'typical_input_bordered'],
                                            'options' => [
                                                'tag' => 'div',
                                                'class' => 'pass_change_line'
                                            ],
                                        ],
                                    ]); ?>

                                    <?= $form->field($changePasswordForm, 'oldPassword')->passwordInput() ?>

                                    <?= $form->field($changePasswordForm, 'password')->passwordInput() ?>

                                    <?= $form->field($changePasswordForm, 'passwordConfirm')->passwordInput() ?>

                                    <div class="pass_change_line">
                                        <div class="green_btn">
                                            <?= Html::submitButton(\Yii::t('app', 'Изменить пароль'), ['class' => 'green_btn_txt']) ?>
                                        </div>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                                <?php if (\Yii::$app->session->hasFlash('passwordSave')):?>
                                <div class="pass_chang_success">
                                    <span class="pass_chang_success_ic"><i class="flaticon-check"></i></span>
                                    <p><?= \Yii::t('app', 'Пароль успешно изменен');?></p>
                                </div>
                                <?php endif;?>
                            </div>
                            <p class="profile_set_btm_link"><?= \Yii::t('app', 'Вы можете удалить свой профиль')?>
                                <a  onclick="$('.delete_account_mod').arcticmodal()"><?= \Yii::t('app', 'здесь')?></a></p>

                            <!--       delete_account_mod            -->

                            <div style="display: none;">
                                <div class="box-modal delete_account_mod">
                                    <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                    <div class="modal">
                                        <div class="modal_top">
                                            <h3><?= \Yii::t('app', 'Удаление профиля')?></h3>
                                            <div class="delete_account_modal_top">
                                                            <span class="d_acc_ic">
                                                                <img src="/img/delete_account_ic.png" alt="">
                                                            </span>
                                                <p><?= \Yii::t('app', 'Пожалуйста, укажите причину, по которой вы хотите удалить свой профиль')?></p>
                                            </div>
                                        </div>
                                        <div class="delete_account_modal_btm">
                                            <?php echo Html::beginForm('')?>
                                            <ul class="typical_chbx_orange">
                                                <li>
                                                    <label>
                                                        <input type="radio" name="unsetMessage" class="styler" value="<?= \Yii::t('app', 'Надоело всё, хочу повесится')?>">
                                                        <span><?= \Yii::t('app', 'Надоело всё, хочу повесится')?></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="radio" name="unsetMessage" class="styler" value="<?= \Yii::t('app', 'Жена бросила сын пидарас')?>">
                                                        <span><?= \Yii::t('app', 'Жена бросила сын пидарас')?></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="radio" name="unsetMessage" class="styler" value="<?= \Yii::t('app', 'С работы уволили, ипотека и автокредит')?>">
                                                        <span><?= \Yii::t('app', 'С работы уволили, ипотека и автокредит')?></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="radio" name="unsetMessage" class="styler" value="<?= \Yii::t('app', 'Друзья не зовут бухать а сами бухают суки')?>">
                                                        <span><?= \Yii::t('app', 'Друзья не зовут бухать а сами бухают суки')?></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="radio" name="unsetMessage" class="styler" value="text" checked>
                                                        <span><?= \Yii::t('app', 'Другая причина')?>:</span>
                                                    </label>
                                                </li>
                                            </ul>
                                            <textarea class="typical_input_bordered" name="unsetMessageText"></textarea>
                                            <div class="hidden_filter_btns">
                                                <div class="green_btn">
                                                    <input type="submit" class="green_btn_txt arcticmodal-close" value="<?= \Yii::t('app', 'Отмена')?>" />
                                                </div>
                                                <?= Html::submitButton(\Yii::t('app', 'Удалить профиль'), ['class' => 'bordered_btn']) ?>
<!--                                                <input type="reset" class="bordered_btn" value="--><?//= \Yii::t('app', 'Удалить профиль')?><!--" />-->
                                            </div>
                                            <?php echo Html::endForm();?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="profile_settings_tabs_title">
                                <h4><?= \Yii::t('app', 'Настройки приватности')?></h4>
                            </div>
                            <?php $form = ActiveForm::begin([
                                'action' => '/ajax/private-settings',
                                'enableAjaxValidation' => false,
                                'options' => ['class'=>'row', 'style' => 'display: initial;'],
                            ]); ?>
                            <table class="profile_settings_privacy">
                                <tbody>
                                <?php foreach (\app\components\Registry::get('user')->privateSettings as $name => $value):?>
                                <tr>
                                    <td><?= $name ?></td>
                                    <td>
                                        <div class="privacy_select">
                                            <select class="private-settings-selector" name="settings[]">
                                                <?php foreach (\app\models\Customer::getPrivateOptions() as $key => $option):?>
                                                    <option value="<?= $key?>" <?= ($key == $value) ? 'selected' : '' ?>><?= $option?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div class="box">
                            <div class="profile_settings_tabs_title">
                                <h4>История посещений</h4>
                            </div>
                            <table class="profile_security_table">
                                <thead>
                                <tr>
                                    <th>Действия</th>
                                    <th>Время</th>
                                    <th>Местоположение</th>
                                    <th>IP адрес</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Авторизация</td>
                                    <td>Вт, 18 апреля 18:55</td>
                                    <td>Архангельск, Россия</td>
                                    <td>83.125.188.125</td>
                                </tr>
                                <tr>
                                    <td>Транзакция</td>
                                    <td>Вс, 16 апреля 22:37</td>
                                    <td>Архангельск, Россия</td>
                                    <td>83.125.188.125</td>
                                </tr>
                                <tr>
                                    <td>Сублимация</td>
                                    <td>Ср, 12 апреля 14:46</td>
                                    <td>Нью-Йорк, Китай</td>
                                    <td>87.174.322.181</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box">
                            <div class="profile_settings_tabs_title">
                                <h4>Платежные реквизиты</h4>
                                <div class="typical_tooltip">
                                    <span class="tooltip-item"><i class="flaticon-logo"></i></span>
                                    <div class="tooltip-content clearfix">
                                        <p>Платежные реквизиты</p>
                                    </div>
                                </div>
                            </div>
                            <div class="profile_settings_pay">
                                <a href="#" class="add_button">Добавить платежные реквизиты</a>
                            </div>
                            <div class="profile_settings_tabs_title">
                                <h4>Платежные реквизиты</h4>
                                <div class="typical_tooltip">
                                    <span class="tooltip-item"><i class="flaticon-logo"></i></span>
                                    <div class="tooltip-content clearfix">
                                        <p>Платежные реквизиты</p>
                                    </div>
                                </div>
                            </div>
                            <div class="profile_settings_pay">
                                <div class="wrap_pay_line">
                                    <div class="pay_line pay_line_to_delete">
                                        <div class="typical_chbx_orange">
                                            <label>
                                                <input type="radio" class="styler" name="pay_1">
                                                <span class="typical_chbx_orange_field">VISA ELECTRON ... 1393</span>
                                            </label>
                                        </div>
                                        <button class="basket_btn basket_btn_close"><i class="flaticon-garbage"></i></button>
                                    </div>
                                </div>
                                <div class="wrap_pay_line">
                                    <div class="pay_line pay_line_to_delete">
                                        <div class="typical_chbx_orange">
                                            <label>
                                                <input type="radio" class="styler" name="pay_1">
                                                <span class="typical_chbx_orange_field">VISA ELECTRON ... 1393</span>
                                            </label>
                                        </div>
                                        <button class="basket_btn basket_btn_close"><i class="flaticon-garbage"></i></button>
                                    </div>
                                </div>

                                <a href="#" class="add_button">Добавить платежные реквизиты</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="decorations_settings">
                            <span class="dec_set_right_1">
                                <img src="/img/decor/decor_set_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
