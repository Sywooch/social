<?php
use \yii\helpers\Url;

$current = false;
?>
<?= $this->render('//site/block/search', []); ?>
<section class="search_page">
    <div class="search_page_top">
        <div class="container clearfix">
            <h1><?= \Yii::t('app', 'Вы искали')?>: <span>Поездка заграницу</span></h1>
            <a href="#" class="add_button"><?= \Yii::t('app', 'Создать новое объяление')?></a>
            <button class="hidden_filter_pull search_filter_pull"><?= \Yii::t('app', 'Расширенный фильтр')?></button>
        </div>
    </div>
    <?= $this->render('//search/block/ads-filter', []); ?>
    <?= $this->render('//search/block/user-filter', []); ?>
    <?= $this->render('//search/block/company-filter', []); ?>
    <div class="search_page_links">
        <div class="container clearfix">
            <ul>
                <?php if (!empty($users)):?>
                    <li><a href="javascript:void(0)" class="tab <?php if (empty($current)) {echo 'current'; $current = 'users';}?>" data-page="users"><?= \Yii::t('app', 'Пользователи')?> (<?= count($users)?>)</a></li>
                <?php endif;?>
                <?php if (!empty($ads)):?>
                    <li><a href="javascript:void(0)" class="tab <?php if (empty($current)) {echo 'current'; $current = 'ads';}?>" data-page="ads"><?= \Yii::t('app', 'Объявления')?> (<?= count($ads)?>)</a></li>
                <?php endif;?>
                <?php if (!empty($companies)):?>
                    <li><a href="javascript:void(0)" class="tab <?php if (empty($current)) {echo 'current'; $current = 'company';}?>" data-page="company"><?= \Yii::t('app', 'Компании')?> (<?= count($companies)?>)</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <?php if (!empty($users)):?>
    <div class="search_page_results users" <?= ($current != 'users') ? 'style="display: none;"' : ''?>>
        <div class="container">
            <div class="recent_search_block">
                <?php foreach ($users as $user):?>
                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="<?= Url::to('/public/profile/' . $user->id)?>" class="title_link"><?= $user->fullName?></a>
                    <span class="item_hint"><?= $user->age?> <?= \Yii::t('app', 'лет')?>, <?= $user->city->area->country->translation->name?>, <?= $user->city->translation->name?></span>
                    <a href="<?= Url::to('/public/profile/' . $user->id)?>" class="recent_search_img">
                        <?php if (!empty($user->mainImage)):?>
                            <img src="/uploads/<?= $user->id?>/<?= $user->mainImage->file?>" alt="">
                        <?php else:?>
                            <img src="/img/no-img-<?= $user->sex?>.jpg" alt="">
                        <?php endif;?>
                        <span class="photos_number_link"><?= count($user->images)?></span>
                    </a>
                    <span class="item_hint"><?= \Yii::t('app', 'Интересы')?></span>
                    <div class="recent_search_item_tags">
                    <?php foreach ($user->interests as $interest):?>
                        <a href="javascript:void(0)" class="grey_tag"><?= $interest->translation->name?></a>
                    <?php endforeach;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php endif;?>

    <?php if (!empty($ads)):?>
    <div class="search_page_results ads" <?= ($current != 'ads') ? 'style="display: none;"' : ''?>>
        <div class="container">
            <div class="recent_search_block">
                <?php foreach ($ads as $element):?>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="<?= Url::to('/public/ads/' . $element->id)?>" class="title_link"><?= $element->title ?></a>
                    <span class="item_hint">
                        <?php if (!empty($element->city)):?>
                            <?= $element->city->area->country->translation->name?>, <?= $element->city->translation->name?>
                        <?php else:?>
                            <?= \Yii::t('app', 'Любой город')?>
                        <?php endif;?>
                    </span>
                    <a href="<?= Url::to('/public/profile/' . $element->customer->id)?>" class="recent_search_img">
                        <?php if (!empty($element->customer->mainImage)):?>
                            <img src="/uploads/<?= $element->customer->id?>/<?= $element->customer->mainImage->file?>" alt="">
                        <?php else:?>
                            <img src="/img/no-img-<?= $element->customer->sex?>.jpg" alt="">
                        <?php endif;?>
                        <span class="photos_number_link"></span>
                    </a>
                    <div class="recent_search_txt">
                        <p><?= $element->content ?></p>
                        <span class="item_hint"><?= $element->customer->fullName?>, <?= $element->customer->age?></span>
                    </div>
                    <div class="recent_search_item_tags">
                        <?php foreach ($element->interests as $interest):?>
                            <a href="javascript:void(0);" class="grey_tag"><?= $interest->translation->name?></a>
                        <?php endforeach;?>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="<?= Url::to('/public/ads/' . $element->id)?>" class="green_btn">
                            <span class="green_btn_txt"><?= \Yii::t('app', 'Присоединиться')?></span>
                        </a>
                        <div class="group_number_block"><span class="group_number"><?= $element->participantsCount?></span></div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="content_load">
                <a href="#" class="load_more_link"><?= \Yii::t('app', 'Загрузить еще')?></a>
            </div>
        </div>
    </div>
    <?php endif;?>

    <?php if (!empty($companies)):?>
    <div class="search_page_results company" <?= ($current != 'company') ? 'style="display: none;"' : ''?>>
        <div class="container">
            <div class="companies_recomandations_inner_block">

                <?php foreach ($companies as $element):?>
                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="<?= Url::to('/public/company/' . $element->id)?>" class="title_link"><?= $element->title?></a>
                    <a href="<?= Url::to('/public/company/' . $element->id)?>" class="companies_recomandations_img">
                        <img src="<?= $element->image?>" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p><?= $element->description?></p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="<?= Url::to('/public/company/' . $element->id)?>" class="green_btn"><span class="green_btn_txt"><?= \Yii::t('app', 'Вступить')?></span></a>
                        <div class="group_number_block"><span class="group_number"><?= $element->ParticipantsCount?></span></div>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
            <div class="content_load">
                <a href="javascript:void(0)" class="load_more_link"><?= \Yii::t('app', 'Загрузить еще')?></a>
            </div>
        </div>
    </div>
    <?php endif;?>
</section>
