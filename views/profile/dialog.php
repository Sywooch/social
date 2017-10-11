<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$messageModel = new \app\models\Messages();
?>
<?= $this->render('//site/block/search', []); ?>
<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

<div class="content">
    <div class="title_block clearfix">
        <h1><?= \Yii::t('app', 'Мои сообщения')?></h1>
    </div>
    <div class="message_content">
        <a href="<?= Url::to('/profile/messages')?>" class="back_link"><?= \Yii::t('app', 'В контакты')?></a>
        <?php if (!empty($dialog)):?>
        <div class="messages_block">
            <?php foreach ($dialog as $message):?>
                <div class="message_item <?= ($message['flag'] == 0) ? 'message_item_not_read' : ''?> clearfix">
                    <a href="<?= Url::to('/profile/user/' . $message['sender']['id'])?>" class="message_author">
                        <img src="/uploads/<?= $message['sender']['id']?>/<?= $message['sender']['mainImage']['file']?>" alt="">
                    </a>
                    <div class="message_item_txt">
                        <p><?= $message['text']?></p>
                        <div class="message_txt_btm">
                            <a href="<?= Url::to('/profile/user/' . $message['sender']['id'])?>"><?= $message['sender']['fullName']?></a>
                            <span><?= $message['date']?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

            <div class="message_item message_item_current clearfix">
                <a href="<?= Url::to('/profile')?>" class="message_author">
                    <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
                </a>
                <div class="message_item_txt">
                    <?php $form = ActiveForm::begin([
                        'action' => '',
                        'enableAjaxValidation' => false,
                        'options' =>
                            [
                                'id' => '',
                                'class'=>'row',
                                'enctype' => 'multipart/form-data',
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
                    <?= $form->field($messageModel, 'senderID')->hiddenInput(['value' => $this->params['user']->id]) ?>
                    <?= $form->field($messageModel, 'receiverID')->hiddenInput(['value' => $receiverID]) ?>
                    <?= $form->field($messageModel, 'text')->textArea(['class' => 'typical_input_bordered']) ?>
                    <div class="green_btn">
                        <?= Html::submitButton(\Yii::t('app', 'Отправить'), ['class' => 'green_btn_txt']) ?>
                    </div>
<!--                    <div class="green_btn">-->
<!--                        <input type="file" class="styler"/>-->
<!--                    </div>-->
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

            <div class="decorations_companies">
                            <span class="dec_comp_left_1">
                                <img src="/img/decor/decor_comp_l_1.png" alt="">
                            </span>
                <span class="dec_comp_right_1">
                                <img src="/img/decor/decor_comp_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
