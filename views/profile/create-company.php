<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$js = "
                                    $('.categories_list_pull').on('click', function () {
                                        $('.wrap_filter_chbx_orange').hide();
                                        $('.categories_item_' + $(this).data('key')).show();

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
                    <h1><?= \Yii::t('app', 'Новая компания')?></h1>
                </div>
                <div class="companies_content">
                    <?php $form = ActiveForm::begin([
                        'action' => '',
                        'enableAjaxValidation' => false,
                        'options' =>
                            [
                                'enctype' => 'multipart/form-data',
                                'data-presave' => 'false'
                            ],
                        'fieldConfig' => [
                            'template' => '{input}{error}',
                            'errorOptions' => ['class' => 'error text-danger'],
                            'options' => [
                                'tag'=>'span'
                            ],
                        ],
                    ]); ?>
                    <div class="new_company_top">
                        <div class="new_company_blue_line">
                            <h4><?= \Yii::t('app', 'Выберите подходящую тему')?></h4>
                            <div class="wrap_filter_chbx_green">
                                <?php if (!empty($interestCategories)):?>
                                    <ul class="filter_chbx_green">
                                        <?php foreach ($interestCategories as $key => $category):?>
                                            <li class="categories_list_pull categories_list_pull" data-key="<?= $key + 1?>">
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span><?= $category['translation']['name']?> (<?= $category['companyCount']?>)</span>
                                                </label>
                                            </li>
                                        <?php endforeach;?>
                                        <!--                                        <li>-->
                                        <!--                                            <button class="filter_chbx_green_pull">Показать все</button>-->
                                        <!--                                        </li>-->
                                    </ul>
                                <?php endif;?>
<!--                                <ul class="filter_chbx_green filter_chbx_green_hidden">-->
<!--                                    <li>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" class="styler">-->
<!--                                            <span>Спорт (12)</span>-->
<!--                                        </label>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" class="styler">-->
<!--                                            <span>Поездка на отдых (9)</span>-->
<!--                                        </label>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" class="styler">-->
<!--                                            <span>Путешествие(27)</span>-->
<!--                                        </label>-->
<!--                                    </li>-->
<!--                                </ul>-->
                            </div>

                            <?php foreach ($interestCategories as $key => $category):?>
                                <div class="wrap_filter_chbx_orange categories_item_<?= $key + 1?>" style="display: none;">
                                    <ul class="filter_chbx_orange">
                                        <?php foreach ($category['interests'] as $interest):?>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler" name="Company[interestsArray][]" value="<?= $interest['id']?>">
                                                    <span><?= $interest['translation']['name']?> (<?= $interest['companyCount']?>)</span>
                                                </label>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            <?php endforeach;?>

                            <p class="new_company_blue_line_btm"><?= \Yii::t('app', 'Нет подходящей темы')?>?
                                <a  onclick="$('.goal_modal').arcticmodal()"><?= \Yii::t('app', 'Добавьте свою')?></a></p>

                            <!--       goal_modal            -->
                            <div style="display: none;">
                                <div class="box-modal goal_modal">
                                    <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                    <div class="modal">
                                        <div class="goal_mod">
                                            <h4>Добавление темы</h4>
                                            <textarea class="typical_input_bordered" placeholder="Перечислите через запятую"></textarea>
                                            <div class="green_btn">
                                                <input type="submit" class="green_btn_txt" value="Добавить" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= Html::error($createModel, 'interestsArray', ['class' => 'error text-danger']); ?>
                        </div>
                        <div class="new_company_line">
                            <div class="new_company_inline">
                                <h4><?= \Yii::t('app', 'Расположение')?></h4>
                                <div class="inner_search_select">
                                    <?= $form->field($createModel, 'cityID')->dropDownList($countriesGroup, ['class' => false])->label(false);?>
                                </div>
                            </div>
                            <span class="new_c_line_ic">
                                          <img src="/img/loc_ic.png" alt="">
                                      </span>
                        </div>
                        <div class="new_company_line">
                            <div class="new_company_inline">
                                <h4><?= \Yii::t('app', 'Сайт компании')?></h4>
                                <?= $form->field($createModel, 'url')->textInput(['class' => 'typical_input_bordered', 'placeholder' => 'http://'])?>
                            </div>
                            <span class="new_c_line_ic"><img src="/img/web_ic.png" alt=""></span>
                        </div>
                        <div class="new_company_line">
                            <div class="new_company_inline">
                                <h4><?= \Yii::t('app', 'Иллюстрация')?></h4>
                                <div class="green_btn">
                                    <?php echo $form->field($createModel, 'file')->fileInput(['class' => 'styler']) ?>
                                </div>
                            </div>
                            <span class="new_c_line_ic"><img src="/img/photo_ic.png" alt=""></span>
                        </div>
                    </div>
                    <div class="new_company_btm">
                        <h4><?= \Yii::t('app', 'Название компании')?></h4>
                        <div class="new_company_btm_input">
                            <?= $form->field($createModel, 'name')->textInput(['class' => 'typical_input_bordered'])?>
                            <span class="new_company_btm_input_number">40</span>
                        </div>
                        <h4><?= \Yii::t('app', 'title компании')?></h4>
                        <div class="new_company_btm_input">
                            <?= $form->field($createModel, 'title')->textInput(['class' => 'typical_input_bordered'])?>
                            <span class="new_company_btm_input_number">255</span>
                        </div>
                        <h4><?= \Yii::t('app', 'Информация о компании')?></h4>
                        <?= $form->field($createModel, 'description')
                            ->textArea(
                                [
                                    'class' => 'typical_input_bordered',
                                    'placeholder' => \Yii::t('app', '')
                                ]
                            ) ?>
                        <div class="hidden_filter_btns">
                            <div class="green_btn">
                                <?= Html::submitButton(\Yii::t('app', 'Опубликовать'), ['class' => 'green_btn_txt']) ?>
                            </div>
                            <input type="reset" class="bordered_btn" value="Отмена" />
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
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
