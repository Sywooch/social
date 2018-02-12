<?php
use yii\helpers\Html;
?>
<div class="search_page_filter company">
    <div class="search_page_filter_item">
        <div class="container">
            <div class="hidden_filter_item">
                <h4><?= \Yii::t('app', 'Найдено в категориях')?>:</h4>
                <?php echo Html::beginForm('/search')?>
                <input type="hidden" name="SearchForm[cityCheckbox]" value="0" />
                <input type="hidden" name="SearchForm[type]" value="<?= \app\models\SearchForm::COMPANY_TYPE?>" />
                <div class="wrap_filter_chbx_green">
                    <?php if (!empty($interestCategories)):?>
                    <ul class="filter_chbx_green">
                        <?php foreach ($interestCategories as $key => $category):?>
                        <li class="categories_list_pull" data-key="<?= $key + 1?>">
                            <label>
                                <input type="checkbox" class="styler">
                                <span><?= $category['translation']['name']?> (<?= $category['companyCount']?>)</span>
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
                                        <span><?= $interest['translation']['name']?> (<?= $interest['companyCount']?>)</span>
                                    </label>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                <?php endforeach;?>
                <div class="hidden_filter_btns">
                    <div class="green_btn">
                        <input type="submit" class="green_btn_txt" value="<?= \Yii::t('app', 'Применить')?>" />
                    </div>
                    <input type="reset" class="bordered_btn" value="<?= \Yii::t('app', 'Отменить')?>" />
                </div>
            </div>
        </div>
    </div>
</div>