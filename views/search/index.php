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
                <li><a href="javascript:void(0)" class="tab current" data-page="users"><?= \Yii::t('app', 'Пользователи')?> (x)</a></li>
                <li><a href="javascript:void(0)" class="tab" data-page="ads"><?= \Yii::t('app', 'Объявления')?> (x)</a></li>
                <li><a href="javascript:void(0)" class="tab" data-page="company"><?= \Yii::t('app', 'Компании')?> (x)</a></li>
            </ul>
        </div>
    </div>

    <div class="search_page_results users">
        <div class="container">
            <div class="recent_search_block">
                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Макс Харитонов</a>
                    <span class="item_hint">29 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/1.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                        <a href="#" class="grey_tag">бухло</a>
                        <a href="#" class="grey_tag">девочки</a>
                        <a href="#" class="grey_tag">наркотарулит</a>
                    </div>
                </div>

                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Вероника Польская</a>
                    <span class="item_hint">32 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/2.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">еда</a>
                        <a href="#" class="grey_tag">питание</a>
                        <a href="#" class="grey_tag">мясо</a>
                        <a href="#" class="grey_tag">кухня</a>
                        <a href="#" class="grey_tag">парни</a>
                    </div>
                </div>

                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Стас Подкопаев</a>
                    <span class="item_hint">25 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/3.jpg" alt="">
                        <span class="photos_number_link">12</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                        <a href="#" class="grey_tag">бухло</a>
                        <a href="#" class="grey_tag">девочки</a>
                        <a href="#" class="grey_tag">наркотарулит</a>
                        <button class="grey_tag more_gr_tags">...</button>
                        <div class="hidden_gr_tags">
                            <div class="wrap_h_gr_tags">
                                <a href="#" class="grey_tag">playstation</a>
                                <a href="#" class="grey_tag">пиво</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Рустам Говняшкин</a>
                    <span class="item_hint">47 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/4.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                        <a href="#" class="grey_tag">бухло</a>
                    </div>
                </div>
                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Макс Харитонов</a>
                    <span class="item_hint">29 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/1.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                        <a href="#" class="grey_tag">бухло</a>
                        <a href="#" class="grey_tag">девочки</a>
                        <a href="#" class="grey_tag">наркотарулит</a>
                    </div>
                </div>

                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Вероника Польская</a>
                    <span class="item_hint">32 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/2.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">еда</a>
                        <a href="#" class="grey_tag">питание</a>
                        <a href="#" class="grey_tag">мясо</a>
                        <a href="#" class="grey_tag">кухня</a>
                        <a href="#" class="grey_tag">парни</a>
                    </div>
                </div>

                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Стас Подкопаев</a>
                    <span class="item_hint">25 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/3.jpg" alt="">
                        <span class="photos_number_link">12</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                        <a href="#" class="grey_tag">бухло</a>
                        <a href="#" class="grey_tag">девочки</a>
                        <a href="#" class="grey_tag">наркотарулит</a>
                        <button class="grey_tag more_gr_tags">...</button>
                        <div class="hidden_gr_tags">
                            <div class="wrap_h_gr_tags">
                                <a href="#" class="grey_tag">playstation</a>
                                <a href="#" class="grey_tag">пиво</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- recent_search_item -->
                <div class="recent_search_item user_search_item">
                    <a href="#" class="title_link">Рустам Говняшкин</a>
                    <span class="item_hint">47 лет, Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/4.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <span class="item_hint">Интересы</span>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                        <a href="#" class="grey_tag">бухло</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="search_page_results ads" style="display: none;">
        <div class="container">
            <div class="recent_search_block">
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Кто со мной в Рим?</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/1.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Надоело пить пиво и смотреть футбольные матчи отдному, ищу того, кто тоже болеет за ЦСК!</p>
                        <span class="item_hint">Евгений, 36</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Ищу друзей для
                        поездки в Хельсинки</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/2.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Хочу сходить на премьеру спектакля “Короли и мыши” в Театр Маяковского, кто со мной!</p>
                        <span class="item_hint">Жанна, 22</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">секс</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Хочу в Париж :-)</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/3.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>В выходные еду на весь день на рыбалку на Южное озеро 30 км от Москвы, пацаны присоединяйтесь :)</p>
                        <span class="item_hint">Олег, 27</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Не с кем поехать в
                        Египет</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/4.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Чуваки!! Давайте зарубимся у меня дома или по сетке в Need For Speed: Rivals!</p>
                        <span class="item_hint">Евгений, 17</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">приключения</a>
                        <a href="#" class="grey_tag">попить пива</a>
                        <a href="#" class="grey_tag">путешествия</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Кто со мной в Рим?</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/1.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Надоело пить пиво и смотреть футбольные матчи отдному, ищу того, кто тоже болеет за ЦСК!</p>
                        <span class="item_hint">Евгений, 36</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Ищу друзей для
                        поездки в Хельсинки</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/2.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Хочу сходить на премьеру спектакля “Короли и мыши” в Театр Маяковского, кто со мной!</p>
                        <span class="item_hint">Жанна, 22</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">секс</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Кто со мной в Рим?</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/1.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Надоело пить пиво и смотреть футбольные матчи отдному, ищу того, кто тоже болеет за ЦСК!</p>
                        <span class="item_hint">Евгений, 36</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">музеи</a>
                        <a href="#" class="grey_tag">путешествия</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Ищу друзей для
                        поездки в Хельсинки</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/2.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Хочу сходить на премьеру спектакля “Короли и мыши” в Театр Маяковского, кто со мной!</p>
                        <span class="item_hint">Жанна, 22</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">секс</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Хочу в Париж :-)</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/3.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>В выходные еду на весь день на рыбалку на Южное озеро 30 км от Москвы, пацаны присоединяйтесь :)</p>
                        <span class="item_hint">Олег, 27</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Не с кем поехать в
                        Египет</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/4.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Чуваки!! Давайте зарубимся у меня дома или по сетке в Need For Speed: Rivals!</p>
                        <span class="item_hint">Евгений, 17</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">приключения</a>
                        <a href="#" class="grey_tag">попить пива</a>
                        <a href="#" class="grey_tag">путешествия</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Хочу в Париж :-)</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/3.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>В выходные еду на весь день на рыбалку на Южное озеро 30 км от Москвы, пацаны присоединяйтесь :)</p>
                        <span class="item_hint">Олег, 27</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
                <!-- announcement_search_item -->
                <div class="recent_search_item announcement_search_item">
                    <a href="#" class="title_link">Не с кем поехать в
                        Египет</a>
                    <span class="item_hint">Россия, Москва</span>
                    <a href="#" class="recent_search_img">
                        <img src="img/recent_search_prof/4.jpg" alt="">
                        <span class="photos_number_link">8</span>
                    </a>
                    <div class="recent_search_txt">
                        <p>Чуваки!! Давайте зарубимся у меня дома или по сетке в Need For Speed: Rivals!</p>
                        <span class="item_hint">Евгений, 17</span>
                    </div>
                    <div class="recent_search_item_tags">
                        <a href="#" class="grey_tag">поездка за рубеж</a>
                        <a href="#" class="grey_tag">приключения</a>
                        <a href="#" class="grey_tag">попить пива</a>
                        <a href="#" class="grey_tag">путешествия</a>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                        <div class="group_number_block"><span class="group_number">180</span></div>
                    </div>
                </div>
            </div>
            <div class="content_load">
                <a href="#" class="load_more_link">Загрузить еще</a>
            </div>
        </div>
    </div>

    <div class="search_page_results company" style="display: none;">
        <div class="container">
            <div class="companies_recomandations_inner_block">
                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Реальные рыбаки</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/1.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>В общем, нестандартный подход основательно подпорчен предыдущим опытом применения.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Мы - Толкинисты!!!</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/2.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>Целевой трафик синхронизирует BTL. Привлечение аудитории, не меняя концепции, </p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Пейте Пиво Пацаны :)</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/3.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>Несмотря на сложности, рекламное сообщество специфицирует социальный статус</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Мы любим сиськи!</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/4.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>А вот по мнению аналитиков ассортиментная политика предприятия усиливает пресс-клиппинг, повышая конкуренцию.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">НЕ здоровое питание</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/5.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>В общем, нестандартный подход основательно подпорчен предыдущим опытом применения.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Выгуливатели собак</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/6.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>Медиаплан обуславливает комплексный инвестиционный продукт. VIP-мероприятие, конечно, раскручивает контент, признавая определенные ю.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>
                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Реальные рыбаки</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/1.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>В общем, нестандартный подход основательно подпорчен предыдущим опытом применения.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Мы - Толкинисты!!!</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/2.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>Целевой трафик синхронизирует BTL. Привлечение аудитории, не меняя концепции, </p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Пейте Пиво Пацаны :)</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/3.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>Несмотря на сложности, рекламное сообщество специфицирует социальный статус</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Мы любим сиськи!</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/4.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>А вот по мнению аналитиков ассортиментная политика предприятия усиливает пресс-клиппинг, повышая конкуренцию.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">НЕ здоровое питание</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/5.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>В общем, нестандартный подход основательно подпорчен предыдущим опытом применения.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>

                <!-- companies_recomandations_item -->
                <div class="companies_recomandations_item">
                    <a href="#" class="title_link">Выгуливатели собак</a>
                    <a href="#" class="companies_recomandations_img">
                        <img src="img/companies_rec/6.jpg" alt="">
                        <span class="view_ic"></span>
                    </a>
                    <div class="com_rec_inn_txt">
                        <p>Медиаплан обуславливает комплексный инвестиционный продукт. VIP-мероприятие, конечно, раскручивает контент, признавая определенные ю.</p>
                    </div>
                    <div class="recent_search_item_btm">
                        <a href="#" class="green_btn"><span class="green_btn_txt">Вступить</span></a>
                        <div class="group_number_block"><span class="group_number">1240</span></div>
                    </div>
                </div>
            </div>
            <div class="content_load">
                <a href="#" class="load_more_link">Загрузить еще</a>
            </div>
        </div>
    </div>
</section>
