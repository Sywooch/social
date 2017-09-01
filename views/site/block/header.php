<?php
/**
 * Хедер с меню.
 *
 * @version 1.0
 */
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$recover = new \app\models\RecoverForm();

$registration = new \app\models\RegisterForm();
?>
<?php if (empty($this->params['user'])):?>
Личный кабинет
<a href="javascript:void(0);" >Войдите в личный кабинет</a>
<?php else:?>
<a href="javascript:void(0);">Личный кабинет</a>
Привет, <?= !empty($this->params['user']->fullName) ? $this->params['user']->fullName : $this->params['user']->email?>
<?php endif;?>

                    <?php $form = ActiveForm::begin([
                            'action' => '/site/recover',
                            'enableAjaxValidation' => true,
                            'options'=>['class'=>'row'],
                            'fieldConfig' => [
                                'template' => '{label}{input}{error}',
                                'errorOptions' => ['class' => 'error text-danger'],
                                'labelOptions' => ['class' => ''],
                                'inputOptions' => ['class' => 'input'],
                                'options' => [
                                    'tag' => 'div',
                                ],
                            ],
                        ]); ?>
                        <?= $form->field($recover, 'email') ?>
                        <?= Html::submitButton('Отправить новый пароль', ['class' => 'button submit']) ?>
                    <?php ActiveForm::end(); ?>

                    <?php $form = ActiveForm::begin([
                            'action' => '/site/login',
                            'enableAjaxValidation' => true,
                            'options'=>['class'=>'row'],
                            'fieldConfig' => [
                                'template' => '{label}{input}{error}',
                                'errorOptions' => ['class' => 'error text-danger'],
                                'labelOptions' => ['class' => ''],
                                'inputOptions' => ['class' => 'input'],
                                'options' => [
                                    'tag' => 'div',
                                ],
                            ],
                        ]); ?>
                        <?= $form->field($this->params['login'], 'email') ?>

                        <?= $form->field($this->params['login'], 'password')->input('password') ?>

                        <?= Html::submitButton('ВОЙТИ', ['class' => 'button submit']) ?>

                    <?php ActiveForm::end(); ?>

                            <a href="<?= $this->params['facebook']->getRedirectLoginHelper()->getLoginUrl('http://' . Yii::$app->getRequest()->serverName . '/social/facebook', ['email'])?>">
                                <img src="/img/login-fb.png" alt="">
                            </a>
                            <a href="<?= $this->params['vk']->getLoginUrl()?>">
                                <img src="/img/login-vk.png" alt="">
                            </a>

                    <?php $form = ActiveForm::begin([
                            'action' => '/registration',
                            'enableAjaxValidation' => true,
                            'options'=>['class'=>'row'],
                            'fieldConfig' => [
                                'template' => '{label}{input}{error}',
                                'errorOptions' => ['class' => 'error text-danger'],
                                'labelOptions' => ['class' => ''],
                                'inputOptions' => ['class' => 'input'],
                                'options' => [
                                    'tag' => 'div',
                                ],
                            ],
                        ]); ?>
                        <?= $form->field($registration, 'email') ?>

                        <?= $form->field($registration, 'password')->input('password') ?>

                        <?= $form->field($registration, 'passwordConfirm')->input('password') ?>

                        <?= Html::submitButton('Зарегестрироваться', ['class' => 'button submit']) ?>

                    <?php ActiveForm::end(); ?>

                            <a href="<?= $this->params['facebook']->getRedirectLoginHelper()->getLoginUrl('http://' . Yii::$app->getRequest()->serverName . '/social/facebook', ['email'])?>">
                                <img src="/img/login-fb.png" alt="">
                            </a>
                            <a href="<?= $this->params['vk']->getLoginUrl()?>">
                                <img src="/img/login-vk.png" alt="">
                            </a>

<?//= \app\components\BasketWidget::widget(['model' => $this->params['basket']]) ?>
<?//= Url::to('/page/'. $this->params['pages']['contacts']->code)?>
