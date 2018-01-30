<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$contactModel = new \app\models\ContactForm();
?>
<footer>
    <div class="container clearfix">
        <div class="wrap_social_foot">
            <h3><?= \Yii::t('app', 'Поддержи нас')?>!</h3>
            <div class="social_foot">
                <a href="javascript:void(0)"><img src="/img/soc_foot/1.png" alt=""></a>
                <a href="javascript:void(0)"><img src="/img/soc_foot/2.png" alt=""></a>
                <a href="javascript:void(0)"><img src="/img/soc_foot/3.png" alt=""></a>
                <a href="javascript:void(0)"><img src="/img/soc_foot/4.png" alt=""></a>
                <a href="javascript:void(0)"><img src="/img/soc_foot/5.png" alt=""></a>
            </div>
        </div>
        <div class="form_foot">
            <h3><?= \Yii::t('app', 'Ваше мнение совет или критика')?></h3>
            <?php $form = ActiveForm::begin([
                'action' => '/ajax/contact',
                'enableAjaxValidation' => true,
                'validationUrl' => '/ajax/contact-validation',
                'options' => ['class'=>'row', 'style' => 'display: initial;'],
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
                <?= $form->field($contactModel, 'text')->textInput(['class' => 'white_input foot_input']) ?>
                <div class="foot_capcha">
                    <?= $form->field($contactModel, 'captcha', ['template' => '<div class="capcha_line">{input}</div><p class="form_mistake_txt">{error}</p>'])->widget(\yii\captcha\Captcha::className(),
                        [
                            'template' => '<span class="capcha_img"><a class="refreshcaptcha" href="javascript:void(0)">{image}</a></span>{input}',
                            'options' => ['class' => 'typical_input_bordered']
                        ]
                    )
                        ->label(false); ?>
                </div>
                <?= Html::submitButton(\Yii::t('app', 'Отправить'), ['class' => 'white_btn']) ?>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="copyright_foot">
            <h3>2015 © Scanpard</h3>
            <nav class="nav_foot">
                <li><a href="<?= Url::to('/page/about')?>"><?= \Yii::t('app', 'О нас')?></a></li>
<!--                <li><a href="#">--><?//= \Yii::t('app', 'Условия')?><!--</a></li>-->
<!--                <li><a href="#">--><?//= \Yii::t('app', 'Помощь')?><!--</a></li>-->
            </nav>
        </div>
    </div>
</footer>
