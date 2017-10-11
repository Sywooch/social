<?php
use yii\helpers\Url;
use yii\helpers\Html;

$js = "
    var customerId = " . $this->params['user']->id . ";
    $('input[name=\"message\"]').on('change', function () {
        console.log(this.value);
        switch (this.value) {
            case 'all':
                $('.index_message_block').show();
                break;
            case '0':
                $('.index_message_block').show();
                $('.index_message_block[data-sender=\"' + customerId + '\"]').hide();
                break;
            default:
                $('.index_message_block').hide();
                $('.index_message_block[data-sender=\"'+this.value+'\"]').show();
        }
    });
    $('input#filter-text').on('change', function () {
        $('form#search').submit();
    });
    $('.calendar_input').on('pickmeup-hide', function (e) {
        $('form#search').submit();
    });
";

$this->registerJs($js);
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
                    <div class="index_message_content">
                        <div class="index_message_top">
                            <?= Html::beginForm([''], 'get', ['id' => 'search']) ?>
                            <div class="mess_searchline">
                                <?= Html::input(
                                    'search',
                                    'text',
                                    \Yii::$app->request->get('text', ''),
                                    [
                                        'id' => 'filter-text',
                                        'class' => 'typical_input_bordered',
                                        'placeholder' => \Yii::t('app', 'Поиск по сообщениям')
                                    ]
                                ) ?>
                                <div class="calendar_block">
                                    <?= Html::input(
                                        'text',
                                        'date',
                                        \Yii::$app->request->get('date', $customDate),
                                        [
                                            'id' => 'filter-period',
                                            'class' => 'typical_input_bordered calendar_input',
                                            'placeholder' => \Yii::t('app', 'За период')
                                        ]
                                    ) ?>
                                    <span class="calendar_ic"><i class="flaticon-time"></i></span>
                                </div>
                            </div>
                            <?= Html::endForm() ?>
                            <ul class="typical_chbx_orange typical_chbx_green">
                                <li>
                                    <label>
                                        <input type="radio" name="message" class="styler" value="all" checked>
                                        <span><?= \Yii::t('app', 'Все')?></span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="message" class="styler" value="<?= $this->params['user']->id?>">
                                        <span><?= \Yii::t('app', 'От меня')?></span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="message" class="styler" value="0">
                                        <span><?= \Yii::t('app', 'Мне')?></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <?php if (!empty($groups)):?>
                            <?php foreach ($groups as $dialog):?>
                                <?php $message = $dialog[0]?>
                                <div class="index_message_block" data-sender="<?= $message['senderID']?>">
                                    <?php if ($message['sender']['id'] == $this->params['user']->id && $message['flag'] == 0):?>
                                        <div class="index_message_item index_message_item_not_read_last">
                                    <?php elseif ($message['sender']['id'] != $this->params['user']->id && $message['flag'] == 0):?>
                                        <div class="index_message_item index_message_item_not_read">
                                    <?php else:?>
                                        <div class="index_message_item">
                                    <?php endif;?>
                                        <div class="index_message_item_left clearfix">
                                            <a href="<?= Url::to('/profile/user/' . $message['sender']['id'])?>" class="message_author">
                                                <img src="/uploads/<?= $message['sender']['id']?>/<?= $message['sender']['mainImage']['file']?>" alt="">
                                            </a>
                                            <div class="index_message_item_left_txt">
                                                <a href="<?= Url::to('/profile/user/' . $message['sender']['id'])?>"><?= $message['sender']['fullName']?></a>
                                                <p><?= $message['date']?></p>
                                            </div>
                                        </div>
                                        <a href="<?= Url::to('/profile/dialog/' . $message['id'])?>" class="index_message_item_right clearfix">
                                            <span><?= $message['text']?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach;?>
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
<script type="text/javascript">

</script>
