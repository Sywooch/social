<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="wrap_content clearfix">
            <?= $this->render('//profile/block/menu', []); ?>

            <div class="content">
                <div class="title_block clearfix">
                    <h1><?= $customer->fullName?></h1>
                </div>
                <div class="profile_page clearfix">
                    <div class="profile_block">
                        <div class="profile_block_top">
                            <div class="profile_quote profile_quote_<?= $customer->sex == 1 ? 'm' : 'w'?>">
                                <p><?= $customer->title?></p>
                            </div>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'Страна')?>, <?= \Yii::t('app', 'Город')?></td>
                                    <td><?= $customer->city->country->translation->name?>, <?= $customer->city->translation->name?></td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'Языки')?></td>
                                    <td><?php echo implode(', ', $customer->languagesList)?></td>
                                </tr>
                                <tr>
                                    <td><?= \Yii::t('app', 'День рождения')?></td>
                                    <td><?= date('d.m.Y', strtotime($customer->birthday))?> (<?= $customer->age?> <?= \Yii::t('app', 'лет')?>)
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
                                    <td><?= $customer->about?></td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="profile_block_top_btns">
                                <a href="#" class="green_btn">
                                    <span class="green_btn_txt">Отправить сообщение</span>
                                </a>
                                <a href="#" class="green_btn add_friend_link">
                                    <span class="green_btn_txt">Добавить в друзья</span>
                                </a>
                                <!--       add_friend_mod            -->

                                <div style="display: none;">
                                    <div class="box-modal add_friend_mod">
                                        <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                        <div class="modal">
                                            <h3>Поздравляем!</h3>
                                            <p>Вы и Светлана Капитонова теперь друзья!</p>
                                            <div class="add_friend_mod_img">
                                                <a href="#" class="add_friend_photo add_friend_photo_m"></a>
                                                <!--                                                            <a href="#" class="add_friend_photo add_friend_photo_f"></a>-->
                                                <a href="#" class="add_friend_photo">
                                                    <img src="img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="add_friend_mod_social">
                                                <a href="#" class="reg_soc_btn reg_soc_btn_tw">Поделиться</a>
                                                <a href="#" class="reg_soc_btn reg_soc_btn_fb">Поделиться</a>
                                                <a href="#" class="reg_soc_btn reg_soc_btn_vk">Поделиться</a>
                                                <a href="#" class="reg_soc_btn reg_soc_btn_od">Поделиться</a>
                                                <a href="#" class="reg_soc_btn reg_soc_btn_g">Поделиться</a>
                                                <a href="#" class="reg_soc_btn reg_soc_btn_inst">Поделиться</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="profile_block_wall">
                            <div class="wall_post">
                                <div class="wall_post_top clearfix">
                                    <a href="#" class="profile_photo_link">
                                        <img src="img/profille_friend.jpg" alt="">
                                    </a>
                                    <div class="wall_post_txt">
                                        <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                            меня честь и удовольствие работать с такой замечательной и
                                            очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                        <a href="#" class="wall_post_img wall_post_img_link">
                                            <img src="img/profile_company_post.jpg" alt="">
                                        </a>
                                        <!--       wall_post_mod            -->

                                        <div style="display: none;">
                                            <div class="box-modal wall_post_mod">
                                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                                <div class="modal">
                                                    <div class="wall_post">
                                                        <h3>Запись со стены: Светлана Капитонова</h3>
                                                        <div class="wall_post_top clearfix">
                                                            <div class="wall_post_txt">
                                                                            <span class="wall_post_img">
                                                                                <img src="img/profile_company_post.jpg" alt="">
                                                                            </span>
                                                                <div class="wall_post_modal_txt clearfix">
                                                                    <a href="#" class="profile_photo_link">
                                                                        <img src="img/profille_friend.jpg" alt="">
                                                                    </a>
                                                                    <div class="wall_post_modal_right">
                                                                        <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                                                            меня честь и удовольствие работать с такой замечательной и
                                                                            очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                                                    </div>

                                                                </div>
                                                                <div class="wall_post_links clearfix">
                                                                    <div class="wall_post_links_left">
                                                                        <p>19 января 2015</p>
                                                                    </div>
                                                                    <div class="wall_post_links_likes">
                                                                        <span>24</span>
                                                                        <a href="#" class="like_btn">Нравится</a>
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
                                                <p>19 января 2015</p>
                                            </div>
                                            <div class="wall_post_links_likes">
                                                <span>24</span>
                                                <a href="#" class="like_btn">Нравится</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wall_comments">
                                    <button class="wall_comments_btn">Показать 10 комментариев</button>
                                    <div class="wall_comment_item clearfix">
                                        <a href="#" class="profile_photo_link">
                                            <img src="img/profile_company.jpg" alt="">
                                        </a>
                                        <div class="wall_comment_item_txt">
                                            <div class="typical_tooltip wall_tooltip">
                                                <span class="tooltip-item"><i class="flaticon-more"></i></span>
                                                <div class="tooltip-content clearfix">
                                                    <ul>
                                                        <li><a href="#">Заблокировать пользователя </a></li>
                                                        <li><a href="#">Удалить комментарий</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="wall_comment_title">Владимир Кожевников</a>
                                            <p>Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                            <div class="wall_post_links clearfix">
                                                <div class="wall_post_links_left">
                                                    <p>19 января 2015</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wall_comment_item clearfix">
                                        <a href="#" class="profile_photo_link">
                                            <img src="img/profile_company.jpg" alt="">
                                        </a>
                                        <div class="wall_comment_item_txt">
                                            <div class="typical_tooltip wall_tooltip">
                                                <span class="tooltip-item"><i class="flaticon-more"></i></span>
                                                <div class="tooltip-content clearfix">
                                                    <ul>
                                                        <li><a href="#">Заблокировать пользователя </a></li>
                                                        <li><a href="#">Удалить комментарий</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="wall_comment_title">Владимир Кожевников</a>
                                            <p>То, что мы сделали за эти несколько месяцев, — это настоящий подвиг</p>
                                            <div class="wall_post_links clearfix">
                                                <div class="wall_post_links_left">
                                                    <p>19 января 2015</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wall_comment_item clearfix">
                                        <a href="#" class="profile_photo_link">
                                            <img src="img/profile_company.jpg" alt="">
                                        </a>
                                        <div class="wall_comment_item_txt">
                                            <div class="typical_tooltip wall_tooltip">
                                                <span class="tooltip-item"><i class="flaticon-more"></i></span>
                                                <div class="tooltip-content clearfix">
                                                    <ul>
                                                        <li><a href="#">Заблокировать пользователя </a></li>
                                                        <li><a href="#">Удалить комментарий</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="#" class="wall_comment_title">Владимир Кожевников</a>
                                            <p>Мероприятие невиданного охвата и с колоссальной идеей.</p>
                                            <div class="wall_post_links clearfix">
                                                <div class="wall_post_links_left">
                                                    <p>19 января 2015</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wall_comment_item clearfix">
                                        <a href="#" class="profile_photo_link">
                                            <img src="img/profile_company.jpg" alt="">
                                        </a>
                                        <div class="wall_comment_item_txt">
                                            <div class="wall_comment_input">
                                                <textarea class="typical_input_bordered" placeholder="Ваш комментарий"></textarea>
                                                <span class="wall_attach">
                                                                <input type="file" class="styler"/>
                                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wall_post">
                                <div class="wall_post_top clearfix">
                                    <a href="#" class="profile_photo_link">
                                        <img src="img/profille_friend.jpg" alt="">
                                    </a>
                                    <div class="wall_post_txt">
                                        <p>Прямо сейчас трансляция Comic Con в San Diego! В 1080, между прочим, Marvel мочат) Ну-ка, покажите нам Quicksilver ^____^</p>
                                        <div class="wall_post_links clearfix">
                                            <div class="wall_post_links_left">
                                                <p>19 января 2015</p>
                                            </div>
                                            <div class="wall_post_links_likes">
                                                <span>6217</span>
                                                <a href="#" class="like_btn">Нравится</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wall_post">
                                <div class="wall_post_top clearfix">
                                    <a href="#" class="profile_photo_link">
                                        <img src="img/profille_friend.jpg" alt="">
                                    </a>
                                    <div class="wall_post_txt">
                                        <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                            меня честь и удовольствие работать с такой замечательной и
                                            очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                        <a href="#" class="wall_post_img wall_post_img_link">
                                            <img src="img/profile_company_post.jpg" alt="">
                                        </a>
                                        <!--       wall_post_mod            -->

                                        <div style="display: none;">
                                            <div class="box-modal wall_post_mod">
                                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                                <div class="modal">
                                                    <div class="wall_post">
                                                        <h3>Запись со стены: Светлана Капитонова</h3>
                                                        <div class="wall_post_top clearfix">
                                                            <div class="wall_post_txt">
                                                                            <span class="wall_post_img">
                                                                                <img src="img/profile_company_post.jpg" alt="">
                                                                            </span>
                                                                <div class="wall_post_modal_txt clearfix">
                                                                    <a href="#" class="profile_photo_link">
                                                                        <img src="img/profille_friend.jpg" alt="">
                                                                    </a>
                                                                    <div class="wall_post_modal_right">
                                                                        <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                                                            меня честь и удовольствие работать с такой замечательной и
                                                                            очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                                                    </div>

                                                                </div>
                                                                <div class="wall_post_links clearfix">
                                                                    <div class="wall_post_links_left">
                                                                        <p>19 января 2015</p>
                                                                    </div>
                                                                    <div class="wall_post_links_likes">
                                                                        <span>24</span>
                                                                        <a href="#" class="like_btn">Нравится</a>
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
                                                <p>19 января 2015</p>
                                            </div>
                                            <div class="wall_post_links_likes wall_post_links_likes_active">
                                                <span>24</span>
                                                <a href="#" class="like_btn">Нравится</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="wall_comments_btn wall_comments_more">Загрузить еще</button>
                        </div>
                    </div>
                    <div class="profile_aside">
                        <a href="#" class="announcement_img avatar_mod_link">
                            <img src="img/profille_friend.jpg" alt="">
                        </a>

                        <!--       avatar_mod            -->

                        <div style="display: none;">
                            <div class="box-modal avatar_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="wall_post">
                                        <h3>Мой аватар</h3>
                                        <div class="wall_post_top clearfix">
                                            <div class="wall_post_txt">
                                                            <span class="wall_post_img">
                                                                <img src="img/crop.jpg" alt="">
                                                            </span>
                                                <div class="wall_post_links clearfix">
                                                    <div class="wall_post_links_left">
                                                        <p>19 января 2015</p>
                                                    </div>
                                                    <div class="wall_post_links_likes">
                                                        <span>24</span>
                                                        <a href="#" class="like_btn">Нравится</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="album_link">Фотоальбом</a>
                        <div class="partner_block">
                            <h3>Ищу напарника</h3>
                            <ul>
                                <li><a href="#">Поебаца дома</a></li>
                                <li><a href="#">Съездить за город на выходные</a></li>
                                <li><a href="#">Поебаца в лифте</a></li>
                            </ul>
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
