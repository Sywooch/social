<div class="profile_block_wall">
    <div class="wall_post wall_post_new">
        <div class="wall_post_top clearfix">
            <a href="javascript:void(0)" class="profile_photo_link">
                <img src="/uploads/<?= $this->params['user']->id?>/<?= $this->params['user']->mainImage->file?>" alt="">
            </a>
            <div class="wall_post_txt">
                <div class="wall_comment_input wall_comment_input_new">
                    <textarea class="typical_input_bordered" placeholder="Ваш комментарий"></textarea>
                    <span class="wall_attach">
                        <input type="file" class="styler"/>
                    </span>
                </div>
                <a href="javascript:void(0)" class="typical_link"><?= \Yii::t('app', 'Отправить');?></a>
            </div>
        </div>

    </div>
    <div class="wall_post wall_post_user">
        <div class="wall_post_top clearfix">
            <div class="wall_post_sett">
                <button class="edit_btn"><i class="flaticon-draw"></i></button>
                <button class="basket_btn"><i class="flaticon-garbage"></i></button>
            </div>
            <a href="#" class="profile_photo_link">
                <img src="img/profille_friend.jpg" alt="">
            </a>
            <div class="wall_post_txt">

                <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                    меня честь и удовольствие работать с такой замечательной и
                    очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля ,
                    Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач,
                    - это самый лучший опыт.</p>
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
                                                                                <img src="img/profile_company_post.jpg"
                                                                                     alt="">
                                                                            </span>
                                        <div class="wall_post_modal_txt clearfix">
                                            <a href="#" class="profile_photo_link">
                                                <img src="img/profille_friend.jpg" alt="">
                                            </a>
                                            <div class="wall_post_modal_right">
                                                <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                                    меня честь и удовольствие работать с такой замечательной и
                                                    очень молодой командой. То, что мы сделали за эти несколько месяцев,
                                                    — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли.
                                                    Работать в коллективе людей, для которых нет невыполнимых задач, -
                                                    это самый лучший опыт.</p>
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
                                <li><a href="#">Это спам!</a></li>
                                <li><a href="#">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="wall_comment_title">Владимир Кожевников</a>
                    <p>Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет
                        невыполнимых задач, - это самый лучший опыт.</p>
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
                                <li><a href="#">Это спам!</a></li>
                                <li><a href="#">Удалить</a></li>
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

    <div class="wall_post wall_post_user">
        <div class="wall_post_sett">
            <button class="edit_btn"><i class="flaticon-draw"></i></button>
            <button class="basket_btn"><i class="flaticon-garbage"></i></button>
        </div>
        <div class="wall_post_top clearfix">
            <a href="#" class="profile_photo_link">
                <img src="img/profille_friend.jpg" alt="">
            </a>
            <div class="wall_post_txt">
                <p>Прямо сейчас трансляция Comic Con в San Diego! В 1080, между прочим, Marvel мочат) Ну-ка, покажите
                    нам Quicksilver ^____^</p>
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
    <div class="wall_post wall_post_user">
        <div class="wall_post_sett">
            <button class="edit_btn"><i class="flaticon-draw"></i></button>
            <button class="basket_btn"><i class="flaticon-garbage"></i></button>
        </div>
        <div class="wall_post_top clearfix">
            <a href="#" class="profile_photo_link">
                <img src="img/profille_friend.jpg" alt="">
            </a>
            <div class="wall_post_txt">
                <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                    меня честь и удовольствие работать с такой замечательной и
                    очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля ,
                    Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач,
                    - это самый лучший опыт.</p>
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
                                                                                <img src="img/profile_company_post.jpg"
                                                                                     alt="">
                                                                            </span>
                                        <div class="wall_post_modal_txt clearfix">
                                            <a href="#" class="profile_photo_link">
                                                <img src="img/profille_friend.jpg" alt="">
                                            </a>
                                            <div class="wall_post_modal_right">
                                                <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                                    меня честь и удовольствие работать с такой замечательной и
                                                    очень молодой командой. То, что мы сделали за эти несколько месяцев,
                                                    — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли.
                                                    Работать в коллективе людей, для которых нет невыполнимых задач, -
                                                    это самый лучший опыт.</p>
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
