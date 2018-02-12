<?php
use app\components\Registry;
use yii\helpers\Html;

$js = "
                                    $('.categories_list_pull').on('click', function () {
                                        $('.wrap_filter_chbx_orange').hide();
                                        $('.categories_item_' + $(this).data('key')).show();

                                    });

";
$this->registerJs($js);
?>
<div class="search_page_filter ads">
    <?php echo Html::beginForm('/search')?>
    <div class="search_page_filter_item">
        <div class="container">
            <div class="hidden_filter_item">
                <h4><?= \Yii::t('app', 'Выберите подходящую тему')?></h4>
                <input type="hidden" name="SearchForm[cityCheckbox]" value="1" />
                <input type="hidden" name="SearchForm[type]" value="<?= \app\models\SearchForm::ADS_TYPE?>" />
                <div class="wrap_filter_chbx_green">
                    <?php if (!empty($interestCategories)):?>
                    <ul class="filter_chbx_green">
                        <?php foreach ($interestCategories as $key => $category):?>
                        <li class="categories_list_pull" data-key="<?= $key + 1?>">
                            <label>
                                <input type="checkbox" class="styler">
                                <span><?= $category['translation']['name']?> (<?= $category['adsCount']?>)</span>
                            </label>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                </div>
                <?php foreach ($interestCategories as $key => $category):?>
                <div class="wrap_filter_chbx_orange categories_item_<?= $key + 1?>" style="display: none;">
                    <ul class="filter_chbx_orange">
                        <?php foreach ($category['interests'] as $interest):?>
                        <li>
                            <label>
                                <input type="checkbox" class="styler" name="SearchForm[interest][]" value="<?= $interest['id']?>">
                                <span><?= $interest['translation']['name']?> (<?= $interest['adsCount']?>)</span>
                            </label>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="search_page_filter_item">
        <div class="container">
            <div class="new_company_line">
                <h4><?= \Yii::t('app', 'Параметры')?></h4>

            </div>
            <div class="new_company_line">
                <ul class="typical_chbx_orange">
                    <li><span class="form_line_title"><?= \Yii::t('app', 'С кем')?></span></li>
                    <?php foreach (\app\models\Ads::getSexTypes() as $key => $type):?>
                    <li>
                        <label>
                            <input type="checkbox" name="SearchForm[sex]" class="styler" value="<?= $key?>">
                            <span><?= $type?></span>
                        </label>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="new_company_line">
                <ul class="typical_chbx_orange birth_date_chosen_wrap">
                    <li><span class="form_line_title"><?= \Yii::t('app', 'Когда')?></span></li>
                    <li>
                        <label class="birth_date_chosen">
                            <input type="radio" class="styler" name="SearchForm[date]" value="1">
                        </label>
                        <div class="typical_birth_date">
                            <button type="button" class="birth_date_pull"><?= \Yii::t('app', 'Выбрать дату')?></button>
                            <div class="birth_date_hidden">
                                <div class="birth_date_coll birth_date_day typical_scroll">
                                    <ul class="birht_date_chbx">
                                        <?php for ($i = 1; $i <= 31; $i++):?>
                                            <li>
                                                <label>
                                                    <input type="radio" class="styler" name="SearchForm[date_day]" value="<?= $i?>">
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
                                                    <input type="radio" class="styler" name="SearchForm[date_month]" value="<?= $numeric?>">
                                                    <span data-numeric="<?= $numeric?>"><?= $translation?></span>
                                                </label>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <div class="birth_date_coll birth_date_coll_year typical_scroll">
                                    <ul class="birht_date_chbx">
                                        <?php for ($i = 1980; $i <= date('Y', time()); $i++):?>
                                            <li>
                                                <label>
                                                    <input type="radio" class="styler" name="SearchForm[date_year]" value="<?= $i?>">
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
                            <input type="radio" class="styler" name="SearchForm[date]" value="0">
                            <span><?= \Yii::t('app', 'Решим вместе')?></span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="new_company_line">
                <div class="filter_key_words">
                    <input type="text" class="typical_input_bordered" name="SearchForm[text]" placeholder="<?= \Yii::t('app', 'Ключевые слова')?>" />
                    <div class="inner_search_select">
                        <select class="city-selector" name="SearchForm[city]">
                            <option value="<?= Registry::get('citySearch')->id?>"><?= Registry::get('citySearch')->area->country->translation->name?>, <?= Registry::get('citySearch')->translation->name?></option>
                            <?php foreach ((new \app\models\City())->getCountriesGroup() as $id => $item):?>
                                <option value="<?= $id?>"><?= $item?></option>
                            <?php endforeach;?>
                            <option value="else"><?= \Yii::t('app', 'Другой город')?>...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search_page_filter_item">
        <div class="container">
            <div class="hidden_filter_item">
                <h4><?= \Yii::t('app', 'Сортировать результаты')?></h4>
                <div class="filter_sort">
                    <ul class="typical_chbx_orange">
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[sort]" value="sortDate" checked/>
                                <span><?= \Yii::t('app', 'По релевантности')?></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[sort]" value="views"/>
                                <span><?= \Yii::t('app', 'По популярности')?></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[sort]" value="timeCreate"/>
                                <span><?= \Yii::t('app', 'По дате публикации')?></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="hidden_filter_btns">
                    <div class="green_btn">
                        <input type="submit" class="green_btn_txt" value="Применить" />
                    </div>
                    <input type="reset" class="bordered_btn" value="Отменить" />
                </div>
            </div>
        </div>
    </div>
    <?php echo Html::endForm();?>
</div>