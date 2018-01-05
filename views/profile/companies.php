<?php
use yii\helpers\Url;
?>
<?= $this->render('//site/block/search', []); ?>
    <section class="main_container light_bg">
        <div class="container">
            <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

                <div class="content">
                    <div class="title_block clearfix">
                        <h1><?= \Yii::t('app', 'Мои компании')?></h1>
                        <a href="<?= Url::to('/profile/create-company')?>" class="add_button"><?= \Yii::t('app', 'Создать компанию')?></a>
                    </div>
                    <div class="profile_settings_tabs company_tabs">
                        <div class="tabs">
                            <span class="tab current"><?= \Yii::t('app', 'Общие')?></span>
                            <span class="tab"><?= \Yii::t('app', 'Приватность')?></span>
                        </div>
                        <div class="profile_settings_tabs_content">
                            <?php if (!empty($companies)):?>
                            <div class="box visible">
                                <div class="company_tabs_block">
                                <?php foreach ($companies as $company):?>
                                    <!-- companies_recomandations_item -->
                                    <div class="companies_recomandations_item">
                                        <a href="<?= Url::to('/profile/company/' . $company->id)?>" class="title_link"><?= $company->name?></a>
                                        <a href="<?= Url::to('/profile/company/' . $company->id)?>" class="companies_recomandations_img">
                                            <img src="<?= $company->image?>" alt="">
                                            <span class="view_ic"></span>
                                            <span class="participant_tag participant_tag_responsible">
                                                <?= \Yii::t('app', 'создатель')?>
                                            </span>
                                        </a>
                                        <div class="companies_recomandations_item_tags">
                                            <?php foreach ($company->interests as $interest):?>
                                                <a href="javascript:void(0)" class="grey_tag"><?= $interest->translation->name?></a>
                                            <?php endforeach;?>
                                        </div>
                                        <div class="companies_recomandations_item_btm">
                                            <a onclick="$('.leave_company_mod').arcticmodal()" class="green_btn">
                                                <span class="green_btn_txt"><?= \Yii::t('app', 'Покинуть группу')?></span></a>
                                            <div class="already_joined_block">
                                                <p><?= \Yii::t('app', 'человек в группе')?></p>
                                                <span class="joined_number"><?= $company->participantsCount?></span>
                                            </div>
                                        </div>
<!--                                        <div class="companies_recomandations_item_btm companies_recomandations_item_btm_joined">-->
<!--                                            <p>Вас назначили  ответственным в группе</p>-->
<!--                                            <a href="#" class="green_btn"><span class="green_btn_txt">Принять</span></a>-->
<!--                                            <button class="cancel_btn_red"><i class="flaticon-close-cross"></i></button>-->
<!--                                        </div>-->
                                    </div>
                                    <div style="display: none;">
                                        <div class="box-modal leave_company_mod">
                                            <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                            <div class="modal">
                                                <div class="modal_top">
                                                    <h3 class="green_txt"><?= \Yii::t('app', 'Вы уверены, что хотите покинуть компанию')?>?</h3>
                                                    <div class="delete_account_modal_top">
                                                                <span class="d_acc_ic">
                                                                    <img src="/img/leave_c_mod.png" alt="">
                                                                </span>
                                                        <p><?= \Yii::t('app', 'Вы являетесь создателем данной компании. Для выхода из нее вам необходимо передать права другому участнику компании')?></p>
                                                    </div>
                                                </div>
                                                <div class="participants_company_block">
                                                    <div class="participants_tabs_top">
                                                        <input type="search" class="typical_input_bordered" placeholder="Поиск по участникам" />
                                                        <p><?= \Yii::t('app', 'Всего')?> 332 <?= \Yii::t('app', 'участника')?></p>
                                                    </div>
                                                    <div class="participants_tabs_inner typical_scroll">
                                                        <div class="participant_item">
                                                            <a href="#" class="wall_comment_title">Владимир Кожевников</a>
                                                            <a href="#" class="participant_item_img">
                                                                <img src="/img/participant.jpg" alt="">
                                                            </a>
                                                            <span class="founder">ответственный</span>
                                                        </div>
                                                        <div class="participant_item">
                                                            <a href="#" class="wall_comment_title">Владимир Кожевников</a>
                                                            <a href="#" class="participant_item_img">
                                                                <img src="/img/participant.jpg" alt="">
                                                            </a>
                                                            <div class="participant_item_btm">
                                                                <a href="#" class="green_btn">
                                                                    <span class="green_btn_txt">Назначить</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                    <!--       leave_company_mod            -->
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
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
