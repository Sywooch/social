<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php //= $this->render('//site/block/main-slider', ['slides' => $slides]); ?>
<section class="main_page_container">
    <div class="swiper-container swiper_main">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style=" background: url(img/slide1.jpg) no-repeat top center;-webkit-background-size: cover;background-size: cover;"></div>
            <div class="swiper-slide" style=" background: url(img/slide2.jpg) no-repeat top center;-webkit-background-size: cover;background-size: cover;"></div>
            <div class="swiper-slide" style=" background: url(img/slide3.jpg) no-repeat top center;-webkit-background-size: cover;background-size: cover;"></div>
        </div>

    </div>
    <div class="main_page_top">
        <div class="full_width_container">
            <div class="main_page_top_wrap clearfix">
                <a href="/" class="logo"><img src="/img/logo.png" alt=""></a>
                <div class="main_page_txt">
                    <p><?= \Yii::t('app', 'Найди друзей по интересам и присоединяйся к компаниям')?>!</p>
                </div>
                <?php if (empty($this->params['user'])):?>
                    <?= $this->render('//site/block/registration-form', []); ?>
                <?php endif;?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white sw_pag_1"></div>
        </div>
    </div>

    <?= $this->render('//site/block/magic-search', ['interests' => $interests]); ?>

</section>
<section class="recent_search_results light_bg">
    <div class="container">
        <div class="title_block clearfix">
            <h2><?= \Yii::t('app', 'Сейчас ищут в')?> <?= $citySearch->translation->name?>:</h2>
            <div class="choose_city_block">

                <div class="typycal_select">
                    <select class="city-selector">
                        <option value="<?= $citySearch->id?>"><?= $citySearch->area->country->translation->name?>, <?= $citySearch->translation->name?></option>
                        <?php foreach ((new \app\models\City())->getCountriesGroup() as $id => $item):?>
                            <option value="<?= $id?>"><?= $item?></option>
                        <?php endforeach;?>
                        <option value="else"><?= \Yii::t('app', 'Другой город')?>...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="recent_search_block">
        <?php if (!empty($ads)):?>
            <?php foreach ($ads as $element):?>
                <!-- recent_search_item -->
                <div class="recent_search_item">
                    <a href="<?= Url::to('/public/ads/' . $element->id)?>" class="title_link"><?= $element->title ?></a>
                    <span class="item_hint"><?= $element->city->area->country->translation->name?>, <?= $element->city->translation->name?></span>
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
                        <a href="<?= Url::to('/public/ads/' . $element->id)?>" class="green_btn"><span class="green_btn_txt"><?= \Yii::t('app', 'Присоединиться')?></span></a>
                        <div class="group_number_block"><span class="group_number"><?= $element->participantsCount?></span></div>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
        </div>
        <div class="block_btm clearfix">
            <?php if(!empty($this->params['user'])):?>
                <a href="<?= Url::to('/profile/create-ads')?>" class="add_button"><?= \Yii::t('app', 'Добавить объявление')?></a>
            <?php endif;?>

            <a href="<?= Url::to('/search/ads')?>" class="more_link"><?= \Yii::t('app', 'Еще')?> <?= $adsCount?> <?= \Yii::t('app', 'объявлений')?></a>
        </div>
    </div>
</section>
<section class="companies_recomandations">
    <div class="container">
        <div class="title_block clearfix">
            <h2><?= \Yii::t('app', 'Присоединяйтесь к компаниям')?>:</h2>
        </div>
        <div class="companies_recomandations_block">
            <?php if (!empty($companies)):?>
                <?php foreach ($companies as $element):?>
                    <!-- companies_recomandations_item -->
                    <div class="companies_recomandations_item">
                        <a href="<?= Url::to('/public/company/' . $element->id)?>" class="title_link"><?= $element->title?></a>
                        <a href="<?= Url::to('/public/company/' . $element->id)?>" class="companies_recomandations_img">
                            <img src="<?= $element->image?>" alt="">
                            <span class="view_ic"></span>
                        </a>
                        <div class="companies_recomandations_item_tags">
                            <?php foreach ($element->interests as $interest):?>
                                <a href="javascript:void(0)" class="grey_tag"><?= $interest->translation->name?></a>
                            <?php endforeach;?>
                        </div>
                        <div class="companies_recomandations_item_btm">
                            <a href="<?= Url::to('/public/company/' . $element->id)?>" class="green_btn"><span class="green_btn_txt"><?= \Yii::t('app', 'Смотреть')?></span></a>
                            <div class="already_joined_block"><p><?= \Yii::t('app', 'Присоединились человек')?></p>
                                <span class="joined_number"><?= $element->ParticipantsCount?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <div class="block_btm clearfix">
            <a href="<?= Url::to('/profile/create-company')?>" class="add_button"><?= \Yii::t('app', 'Создать компанию')?></a>
            <a href="<?= Url::to('/search/company')?>" class="more_link"><?= \Yii::t('app', 'Еще')?> <?= $companiesCount?> <?= \Yii::t('app', 'компаний')?></a>
        </div>
    </div>
</section>

<?= $this->render('//site/block/modals', []); ?>