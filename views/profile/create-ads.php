<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$js = "
                                    $('.categories_list_pull').on('click', function () {
                                        $('.wrap_filter_chbx_orange').hide();
                                        $('.categories_item_' + $(this).data('key')).show();

                                    });

";
$this->registerJs($js);

$postAds = \Yii::$app->request->post('Ads');
?>
<?= $this->render('//site/block/search', []); ?>
    <section class="main_container light_bg">
        <div class="container">
            <div class="wrap_content clearfix">
<?= $this->render('//profile/block/menu', []); ?>

                <div class="content">
                    <div class="title_block clearfix">
                        <h1><?= \Yii::t('app', 'Новое объявление');?></h1>
                    </div>
                    <div class="companies_content">
                        <?php $form = ActiveForm::begin([
                            'action' => '',
                            'enableAjaxValidation' => false,
                            'options' =>
                                [
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
                        <div class="new_company_title">
                            <h4><?= \Yii::t('app', 'Заголовок');?></h4>
                            <?= $form->field($createModel, 'title')->textInput(['class' => 'typical_input_bordered']) ?>
                        </div>
                        <div class="new_company_top">

                            <div class="new_company_blue_line">
                                <h4><?= \Yii::t('app', 'Популярные цели');?></h4>
                                <div class="wrap_filter_chbx_green">
                                    <?php if (!empty($interestCategories)):?>
                                    <ul class="filter_chbx_green">
                                        <?php foreach ($interestCategories as $key => $category):?>
                                        <li class="categories_list_pull categories_list_pull" data-key="<?= $key + 1?>">
                                            <label>
                                                <input type="checkbox" class="styler">
                                                <span><?= $category['translation']['name']?> (<?= $category['adsCount']?>)</span>
                                            </label>
                                        </li>
                                        <?php endforeach;?>
<!--                                        <li>-->
<!--                                            <button class="filter_chbx_green_pull">Показать все</button>-->
<!--                                        </li>-->
                                    </ul>
                                    <?php endif;?>
<!--                                    <ul class="filter_chbx_green filter_chbx_green_hidden">-->
<!--                                        <li>-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" class="styler">-->
<!--                                                <span>Спорт (12)</span>-->
<!--                                            </label>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" class="styler">-->
<!--                                                <span>Поездка на отдых (9)</span>-->
<!--                                            </label>-->
<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <label>-->
<!--                                                <input type="checkbox" class="styler">-->
<!--                                                <span>Путешествие(27)</span>-->
<!--                                            </label>-->
<!--                                        </li>-->
<!--                                    </ul>-->
                                </div>

                                <?php foreach ($interestCategories as $key => $category):?>
                                <div class="wrap_filter_chbx_orange categories_item_<?= $key + 1?>" style="display: none;">
                                    <ul class="filter_chbx_orange">
                                        <?php foreach ($category['interests'] as $interest):?>
                                        <li>
                                            <label>
                                                <input type="checkbox" class="styler" name="Ads[interestsArray][]" value="<?= $interest['id']?>">
                                                <span><?= $interest['translation']['name']?> (<?= $interest['adsCount']?>)</span>
                                            </label>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <?php endforeach;?>
                                <p class="new_company_blue_line_btm">
                                    <?= \Yii::t('app', 'Нет подходящей цели');?>?
                                    <a  onclick="$('.self_goal_mod').arcticmodal()"><?= \Yii::t('app', 'Добавьте свою')?></a>
                                </p>
                                <!--       self_goal_mod            -->

                                <div style="display: none;">
                                    <div class="box-modal self_goal_mod">
                                        <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                        <div class="modal">
                                            <div class="modal_top">
                                                <h3>Добавление новой цели</h3>
                                                <div class="new_company_blue_line">
                                                    <h4>Популярные цели</h4>
                                                    <div class="wrap_filter_chbx_green">
                                                        <ul class="filter_chbx_green">
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Спорт (12)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Поездка на отдых (9)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Путешествие(27)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Работа, бизнес(10)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Знакомства(640)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Прогулка(11)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Игры(27)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Обучение(3)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Попить кофе(17)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <button class="filter_chbx_green_pull">Все цели</button>
                                                            </li>
                                                        </ul>
                                                        <ul class="filter_chbx_green filter_chbx_green_hidden">
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Спорт (12)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Поездка на отдых (9)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Путешествие(27)</span>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="wrap_filter_chbx_orange">
                                                        <ul class="filter_chbx_orange">
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Скалолазание (12)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Волейбол (41)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Футбол (3)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Бокс (12)</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" class="styler">
                                                                    <span>Рыбалка (142)</span>
                                                                </label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal_btm">
                                                <input type="text" class="typical_input_bordered" />
                                                <div class="green_btn">
                                                    <input type="submit" class="green_btn_txt" value="Добавить" />
                                                </div>
                                                <p>Здесь перечислены рекомендации по добавлению новой цели, что можно писать, что запрещено и т.д.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?= Html::error($createModel, 'interestsArray', ['class' => 'error text-danger']); ?>
                            </div>
                            <div class="new_company_line">
                                <h4><?= \Yii::t('app', 'Мои данные')?></h4>
                                <?= $form->field($createModel, 'data')
                                    ->textArea(
                                        [
                                            'class' => 'typical_input_bordered',
                                        ]
                                    ) ?>
                            </div>
                            <div class="new_company_line">
                                <h4><?= \Yii::t('app', 'Расположение')?></h4>
                                <ul class="typical_chbx_orange">
                                    <li>
                                        <label>
                                            <input type="radio" class="styler" name="location" value="<?= $this->params['user']->city->id?>" checked>
                                            <span>
                                                <?= \Yii::t('app', 'В моем городе')?>
                                                (<?= $this->params['user']->city->translation->name?>)
                                            </span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" class="styler" name="location" value="dropDown">
                                        </label>
                                        <div class="inner_search_select">
                                            <?= $form->field($createModel, 'city')
                                                ->dropDownList(\yii\helpers\ArrayHelper::merge($countriesGroup, ['else' => \Yii::t('app', 'Другой город...')]), ['class' => 'city-selector'])
                                                ->label(false);?>
                                        </div>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" class="styler" name="location" value="null">
                                            <span><?= \Yii::t('app', 'Не важно')?></span>
                                        </label>
                                    </li>
                                </ul>
                                <?= Html::error($createModel, 'city', ['class' => 'error text-danger']); ?>
                                <span class="new_c_line_ic">
                                      <img src="/img/loc_ic.png" alt="">
                                </span>
                            </div>
                            <div class="new_company_line">
                                <h4><?= \Yii::t('app', 'С кем')?></h4>
                                <ul class="typical_chbx_orange">
                                    <?php foreach ($createModel->sexTypes as $key => $type):?>
                                    <li>
                                        <label>
                                            <input type="radio" class="styler" name="Ads[sex]" value="<?= $key?>"
                                            <?= (isset($postAds['sex']) && $postAds['sex'] == $key) ? 'checked' : ''?> />
                                            <span><?= $type?></span>
                                        </label>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                                <?= Html::error($createModel, 'sex', ['class' => 'error text-danger']); ?>
                                <span class="new_c_line_ic">
                                      <img src="/img/sex_ic.png" alt="">
                                </span>
                            </div>
                            <div class="new_company_line">
                                <h4><?= \Yii::t('app', 'Когда')?></h4>
                                <ul class="typical_chbx_orange birth_date_chosen_wrap">
                                    <li>
                                        <label class="birth_date_chosen">
                                            <input type="radio" class="styler" name="date" value="1">
                                            <span><?= \Yii::t('app', 'Точная дата')?></span>
                                        </label>
                                        <div class="typical_birth_date">
                                            <button class="birth_date_pull"><?= \Yii::t('app', 'Выбрать дату')?></button>
                                            <div class="birth_date_hidden">
                                                <div class="birth_date_coll birth_date_day typical_scroll">
                                                    <ul class="birht_date_chbx">
                                                        <?php for ($i = 1; $i <= 31; $i++):?>
                                                            <li>
                                                                <label>
                                                                    <input type="radio" class="styler" name="date_day" value="<?= $i?>">
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
                                                                    <input type="radio" class="styler" name="date_month" value="<?= $numeric?>">
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
                                                                    <input type="radio" class="styler" name="date_year" value="<?= $i?>">
                                                                    <span data-numeric="<?= $i?>" ><?= $i?></span>
                                                                </label>
                                                            </li>
                                                        <?php endfor;?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <label class="birth_date_chosen2">
                                            <input type="radio" class="styler" name="date" value="0" checked>
                                            <span><?= \Yii::t('app', 'Решим вместе')?></span>
                                        </label>
                                    </li>
                                </ul>
                                <?= Html::error($createModel, 'date', ['class' => 'error text-danger']); ?>
                                <span class="new_c_line_ic">
                                      <img src="/img/date_ic.png" alt="">
                                </span>
                            </div>
                        </div>
                        <div class="new_company_btm">
                            <h4><?= \Yii::t('app', 'Текст объявления');?></h4>
                            <?= $form->field($createModel, 'content')
                                ->textArea(
                                        [
                                            'class' => 'typical_input_bordered',
                                            'placeholder' => \Yii::t('app', 'Введите текст объявления')
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
                            <span class="dec_ann_left_1">
                                <img src="/img/decor/decor_ann_l_1.png" alt="">
                            </span>
                    <span class="dec_ann_right_1">
                                <img src="/img/decor/decor_ann_r_1.png" alt="">
                            </span>
                </div>
            </div>

        </div>
</section>
<?= $this->render('//site/block/modals', []); ?>