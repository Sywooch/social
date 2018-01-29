<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

            <div class="content">
                <div class="title_block clearfix">
                    <h1><?= $this->params['user']->fullName?></h1>
                </div>
                <div class="profile_page clearfix">
                    <div class="profile_block">
                        <div class="profile_block_top">
                            <div class="profile_quote profile_quote_<?= $this->params['user']->sex == 1 ? 'm' : 'w'?>">
                                <p><?= $this->params['user']->title?></p>
                            </div>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'Страна')?>, <?= \Yii::t('app', 'Город')?></td>
                                    <td>
                                        <a href="javascript:void(0)" class="change_city_link">
                                            <?= $this->params['user']->city->area->country->translation->name?>, <?= $this->params['user']->city->translation->name?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'Языки')?></td>
                                    <td><?php echo implode(', ', $this->params['user']->languagesList)?></td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'День рождения')?></td>
                                    <td><?= date('d.m.Y', strtotime($this->params['user']->birthday))?> (<?= $this->params['user']->age?> <?= \Yii::t('app', 'лет')?>)
                                        <div class="horoscope">
                                            <div class="typical_tooltip horoscope_tooltip">
                                                <span class="tooltip-zodiac zodiac_pisces"></span>

                                                <!-- change class to display another icon
<span class="tooltip-zodiac zodiac_aquarius"></span>
<span class="tooltip-zodiac zodiac_taurus"></span>
<span class="tooltip-zodiac zodiac_leo"></span>
<span class="tooltip-zodiac zodiac_pisces"></span>
<span class="tooltip-zodiac zodiac_virgo"></span>
<span class="tooltip-zodiac zodiac_scorpio"></span>
<span class="tooltip-zodiac zodiac_libra"></span>
<span class="tooltip-zodiac zodiac_cancer"></span>
<span class="tooltip-zodiac zodiac_aries"></span>
<span class="tooltip-zodiac zodiac_capricorn"></span>
<span class="tooltip-zodiac zodiac_gemini"></span>
-->

                                                <div class="tooltip-content clearfix">
                                                    <p>Год лошади</p>
                                                </div>
                                            </div>
                                            <div class="typical_tooltip horoscope_tooltip">
                                                <span class="tooltip-years chinese_horse"></span>

                                                <!-- change class to display another icon --
<span class="tooltip-years chinese_dog"></span>
<span class="tooltip-years chinese_ox"></span>
<span class="tooltip-years chinese_horse"></span>
<span class="tooltip-years chinese_dragon"></span>
<span class="tooltip-years chinese_goat"></span>
<span class="tooltip-years chinese_rat"></span>
<span class="tooltip-years chinese_snake"></span>
<span class="tooltip-years chinese_tiger"></span>
<span class="tooltip-years chinese_rabbit"></span>
<span class="tooltip-years chinese_rooster"></span>
<span class="tooltip-years chinese_pig"></span>
<span class="tooltip-years chinese_monkey"></span>
-->

                                                <div class="tooltip-content clearfix">
                                                    <p>Год лошади</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'О себе')?></td>
                                    <td><?= $this->params['user']->about?>
                                        <a href="javascript:void(0)" class="typical_link"><?= \Yii::t('app', 'Изменить описание')?></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <?= $this->render('//profile/block/index/comment', ['comments' => $comments, 'pages' => $pages]); ?>
                    </div>
                    <div class="profile_aside">
                        <a href="javascript:void(0)" class="announcement_img avatar_mod_link">
                            <?php if (!empty($this->params['user']->mainImage)):?>
                                <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
                            <?php else:?>
                                <img src="/img/no-img-<?= $this->params['user']->sex?>.jpg" alt="">
                            <?php endif;?>
                        </a>

                        <!--       avatar_mod            -->
                        <div style="display: none;">
                            <div class="box-modal avatar_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="wall_post">
                                        <h3><?= \Yii::t('app', 'Мой аватар')?></h3>
                                        <div class="wall_post_top clearfix">
                                            <div class="wall_post_txt">
                                                            <span class="wall_post_img">
                                                            <?php if (!empty($this->params['user']->mainImage)):?>
                                                                <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
                                                            <?php else:?>
                                                                <img src="/img/no-img-<?= $this->params['user']->sex?>.jpg" alt="">
                                                            <?php endif;?>
                                                            </span>
                                                <div class="wall_post_links clearfix">
                                                    <div class="wall_post_links_left">
                                                        <p><?= $this->params['user']->mainImage->date?></p>
                                                    </div>
                                                    <div class="wall_post_links_likes">
                                                        <span><?= $this->params['user']->mainImage->likePoint?></span>
                                                        <a href="javascript:void(0)" class="like_btn"><?= \Yii::t('app', 'Нравится');?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="side_links">
                            <a href="#" class="typical_link">Загрузить новое фото</a>
                            <a href="#" class="typical_link">Изменить миниатюру</a>
                        </div>
                        <a href="#" class="album_link">Фотоальбом</a>
                        <div class="partner_block">
                            <h3>Ищу напарника</h3>
                            <ul>
                                <li><a href="#">Поебаца дома</a></li>
                                <li><a href="#">Съездить за город на выходные</a></li>
                                <li><a href="#">Поебаца в лифте</a></li>
                            </ul>
                            <a href="#" class="bordered_btn">Добавить</a>
                        </div>
                        <div class="side_companies">
                            <h3>Мои компании</h3>
                            <!-- companies_recomandations_item -->
                            <div class="companies_recomandations_item side_companies_recomandations_item">
                                <a href="#" class="title_link">Жизнь - тлен</a>
                                <a href="#" class="companies_recomandations_img">
                                    <img src="img/companies_rec/1.jpg" alt="">
                                    <span class="view_ic"></span>
                                </a>
                                <div class="recent_search_item_btm">
                                    <span class="recent_search_item_btm_txt">Участник</span>
                                    <div class="group_number_block"><span class="group_number">1240</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="company_participants">
                            <h3>Мои друзья</h3>
                            <div class="company_participants_links">
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                                <a href="#" class="company_participant_it"><img src="img/participant.jpg" alt=""></a>
                            </div>
                            <a href="#" class="prof_all_link">Все друзья (118)</a>

                        </div>
                        <div class="profile_interests_block">
                            <h3>Интересы</h3>
                            <div class="companies_recomandations_item_tags">
                                <a href="#" class="grey_tag">еда</a>
                                <a href="#" class="grey_tag">питание</a>
                                <a href="#" class="grey_tag">мясо</a>
                                <a href="#" class="grey_tag">кухня</a>
                                <a href="#" class="grey_tag">парни</a>
                                <button class="grey_tag more_gr_tags">...</button>
                                <div class="hidden_gr_tags">
                                    <div class="wrap_h_gr_tags">
                                        <a href="#" class="grey_tag">пельмени</a>
                                        <a href="#" class="grey_tag">пиво</a>
                                        <a href="#" class="grey_tag">playstation</a>
                                        <a href="#" class="grey_tag">пиво</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="decorations_settings">
                            <span class="dec_set_right_1">
                                <img src="/img/decor/decor_prof_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
