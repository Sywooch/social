<?php
use app\components\Registry;
use yii\helpers\Html;
?>
<div class="search_page_filter users">
    <div class="search_page_filter_item">
        <div class="container">
            <div class="hidden_filter_item">
                <?php echo Html::beginForm('/search')?>
                <input type="hidden" name="SearchForm[cityCheckbox]" value="1" />
                <input type="hidden" name="SearchForm[type]" value="<?= \app\models\SearchForm::USER_TYPE?>" />
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
                <div class="filter_sort">
                    <ul class="typical_chbx_orange">
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[sex]" value="1" checked/>
                                <span><?= \Yii::t('app', 'Только мужчины')?></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[sex]" value="2"/>
                                <span><?= \Yii::t('app', 'Только женщины')?></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[photo]" value="1"/>
                                <span><?= \Yii::t('app', 'С фото')?></span>
                            </label>
                        </li>
                        <li>
                            <label>
                                <input type="radio" class="styler" name="SearchForm[elder]" value="1"/>
                                <span><?= \Yii::t('app', 'Более года на сервисе')?></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="hidden_filter_btns">
                    <div class="green_btn">
                        <input type="submit" class="green_btn_txt" value="<?= \Yii::t('app', 'Применить')?>" />
                    </div>
                    <input type="reset" class="bordered_btn" value="<?= \Yii::t('app', 'Отменить')?>" />
                </div>
                <?php echo Html::endForm();?>
            </div>
        </div>
    </div>
</div>