<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$model = new \app\models\CompanyComment();
$answerModel = new \app\models\CompanyCommentAnswer();
$currentPage = 1;
$lastPage = ceil($pages->totalCount / \Yii::$app->params['commentsOnPage']);
?>
<script type="text/javascript">
    var enable_scroll_loading = true;
</script>
<?= Html::input('hidden', 'currentPage', $currentPage, ['id' => 'currentPage'])?>
<?= Html::input('hidden', 'lastPage', $lastPage, ['id' => 'lastPage'])?>

<div class="profile_block_wall">
    <?php if(!empty($this->params['user'])):?>
    <div class="wall_post message-send" style="display: none;">
        <div class="wall_post_top clearfix">
            <a href="javascript:void(0)" class="profile_photo_link">
                <?php if (!empty($this->params['user']->mainImage)):?>
                    <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
                <?php else:?>
                    <img src="/img/no-img-<?= $this->params['user']->sex?>.jpg" alt="">
                <?php endif;?>
            </a>
            <div class="wall_post_txt">
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
                        'template' => '{input}{error}',
                        'errorOptions' => ['class' => 'error text-danger'],
                        'labelOptions' => ['class' => ''],
                        'inputOptions' => ['class' => 'typical_input_bordered'],
                        'options' => [
                            'tag'=>'span'
                        ],
                    ],
                ]); ?>
                <div class="wall_comment_input wall_comment_input_new">
                    <?= $form->field($model, 'customerID')->hiddenInput(['value' => $this->params['user']->id]) ?>
                    <?= $form->field($model, 'text')
                        ->textArea(['class' => 'typical_input_bordered', 'placeholder' => \Yii::t('app', 'Ваш комментарий')]) ?>

                    <span class="wall_attach">
                        <?php echo $form->field($model, 'image')->fileInput(['class' => 'styler']) ?>
                    </span>
                </div>

                <?= Html::submitButton(\Yii::t('app', 'Отправить'), ['class' => 'typical_link']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>


<div class="profile_block_wall">
    <?php if (!empty($comments)):?>
        <?php foreach ($comments as $comment):?>
            <div class="wall_post">
                <div class="wall_post_top clearfix">
                    <div class="wall_post_sett">
                        <button class="edit_btn"><i class="flaticon-draw"></i></button>
                        <button class="basket_btn"><i class="flaticon-garbage"></i></button>
                    </div>
                    <a href="javascript:void(0)" class="profile_photo_link">
                        <img src="/uploads/<?= $comment['customerID']?>/<?= $comment['customer']['mainImage']['file']?>" alt="">
                    </a>
                    <div class="wall_post_txt">
                        <p><?= $comment['text']?></p>
                        <?php if (!empty($comment['images'])):?>
                            <?php foreach ($comment['images'] as $image):?>
                                <a href="javascript:void(0)" class="wall_post_img wall_post_img_link">
                                    <img src="<?= $image['file']?>" alt="">
                                </a>
                            <?php endforeach; ?>
                        <?php endif;?>
                        <!--       wall_post_mod            -->

                        <div style="display: none;">
                            <div class="box-modal wall_post_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="wall_post">
                                        <h3><?= \Yii::t('app', 'Запись со стены')?>: <?= $comment['customer']['fullName']?></h3>
                                        <div class="wall_post_top clearfix">
                                            <div class="wall_post_txt">
                                                <?php if (!empty($comment['images'])):?>
                                                    <?php foreach ($comment['images'] as $image):?>
                                                        <span class="wall_post_img">
                                                            <img src="<?= $image['file']?>" alt="">
                                                        </span>
                                                    <?php endforeach; ?>
                                                <?php endif;?>
                                                <div class="wall_post_modal_txt clearfix">
                                                    <a href="javascript:void(0)" class="profile_photo_link">
                                                        <img src="/uploads/<?= $comment['customerID']?>/<?= $comment['customer']['mainImage']['file']?>" alt="">
                                                    </a>
                                                    <div class="wall_post_modal_right">
                                                        <p><?= $comment['text']?></p>
                                                    </div>

                                                </div>
                                                <div class="wall_post_links clearfix">
                                                    <div class="wall_post_links_left">
                                                        <p><?= $comment['date']?></p>
                                                    </div>
                                                    <div class="wall_post_links_likes">
                                                        <span><?= $comment['likePoint']?></span>
                                                        <a href="javascript:void(0)" class="like_btn"><?= \Yii::t('app', 'Нравится')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wall_post_links clearfix">
                            <div class="wall_post_links_left">
                                <p><?= $comment['date']?></p>
                                <a href="<?= Url::to('/public/profile/' . $comment['customerID'])?>" class="wall_post_author"><?= $comment['customer']['fullName']?></a>
                            </div>
                            <div class="wall_post_links_likes">
                                <span><?= $comment['likePoint']?></span>
                                <a href="javascript:void(0)" class="like_btn"><?= \Yii::t('app', 'Нравится')?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wall_comments">
<!--                    <button class="wall_comments_btn">Показать 10 комментариев</button>-->
                    <?php if (!empty($comment['answers'])):?>
                        <?php foreach ($comment['answers'] as $answer):?>
                            <div class="wall_comment_item clearfix">
                                <a href="javascript:void(0)" class="profile_photo_link">
                                    <img src="/uploads/<?= $answer['customer']['id']?>/<?= $answer['customer']['mainImage']['file']?>" alt="">
                                </a>
                                <div class="wall_comment_item_txt">
                                    <div class="typical_tooltip wall_tooltip">
                                        <span class="tooltip-item"><i class="flaticon-more"></i></span>
                                        <div class="tooltip-content clearfix">
                                            <ul>
                                                <li><a href="javascript:void(0)"><?= \Yii::t('app', 'Это спам')?>!</a></li>
                                                <li><a href="javascript:void(0)"><?= \Yii::t('app', 'Удалить')?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="#" class="wall_comment_title"><?= $answer['customer']['fullName']?></a>
                                    <p><?= $answer['text']?></p>
                                    <div class="wall_post_links clearfix">
                                        <div class="wall_post_links_left">
                                            <p><?= $answer['date']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <?php if(!empty($this->params['user'])):?>
                    <a href="javascript:void(0)" class="typical_link answer"><?= \Yii::t('app', 'Ответить')?></a>
                    <div class="wall_comment_item answer clearfix" style="display: none;">
                        <a href="javascript:void(0)" class="profile_photo_link">
                            <?php if (!empty($this->params['user']->mainImage)):?>
                                <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
                            <?php else:?>
                                <img src="/img/no-img-<?= $this->params['user']->sex?>.jpg" alt="">
                            <?php endif;?>
                        </a>
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
                                'template' => '{input}{error}',
                                'errorOptions' => ['class' => 'error text-danger'],
                                'labelOptions' => ['class' => ''],
                                'inputOptions' => ['class' => 'typical_input_bordered'],
                                'options' => [
                                    'tag'=>'span'
                                ],
                            ],
                        ]); ?>
                        <?= $form->field($answerModel, 'customerID')->hiddenInput(['value' => $this->params['user']->id]) ?>
                        <?= $form->field($answerModel, 'commentID')->hiddenInput(['value' => $comment['id']]) ?>

                        <div class="wall_comment_item_txt">
                            <div class="wall_comment_input">
                                <?= $form->field($answerModel, 'text')
                                    ->textArea(['class' => 'typical_input_bordered', 'placeholder' => \Yii::t('app', 'Ваш комментарий')]) ?>
<!--                                <span class="wall_attach">-->
                                    <?php //= $form->field($answerModel, 'image')->fileInput(['class' => 'styler']) ?>
<!--                                </span>-->
                            </div>
                        </div>
                        <?= Html::submitButton(\Yii::t('app', 'Отправить'), ['class' => 'typical_link']) ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>

<!--    <button class="wall_comments_btn wall_comments_more">--><?//= \Yii::t('app', 'Загрузить еще')?><!--</button>-->
</div>
