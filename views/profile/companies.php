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
                        <h1>Компании</h1>
                        <a href="<?= Url::to('/profile/create-company')?>" class="add_button"><?= \Yii::t('app', 'Создать компанию')?></a>
                    </div>
                    <div class="companies_content">
                        <div class="filters_block">
                            <div class="filter_link">
                                <ul>
                                    <li><a href="#">Категория</a></li>
                                    <li><a href="#">Тракторы</a></li>
                                    <li><a href="#">Стаканы</a></li>
                                    <li><a href="#">Принтеры</a></li>
                                    <li><a href="#">Холодильники</a></li>
                                    <li><a href="#">Скидки</a></li>
                                    <li><a href="#">Лыжи</a></li>
                                    <li><a href="#">Шоколад</a></li>
                                    <li><a href="#">Пионеры</a></li>
                                    <li><a href="#">Холодильники</a></li>
                                    <li><a href="#">Скидки</a></li>
                                    <li><a href="#">Лыжи</a></li>
                                    <li><a href="#">Шоколад</a></li>
                                    <li><a href="#">Пионеры</a></li>
                                    <li><a href="#">Тракторы</a></li>
                                    <li><a href="#">Стаканы</a></li>
                                    <li><a href="#">Принтеры</a></li>
                                </ul>
                            </div>
                            <div class="hidden_filter_block">
                                <button class="hidden_filter_pull">Расширенный фильтр</button>
                                <div class="hidden_filter">
                                    <div class="hidden_filter_item">
                                        <h4>Выберите подходящую тему</h4>
                                        <div class="wrap_filter_chbx_green">
                                            <ul class="filter_chbx_green">
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Спорт (12)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Поездка на отдых (9)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Путешествие(27)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Работа, бизнес(10)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Знакомства(640)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Прогулка(11)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Игры(27)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Обучение(3)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Попить кофе(17)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <button class="filter_chbx_green_pull">Показать все</button>
                                                </li>
                                            </ul>
                                            <ul class="filter_chbx_green filter_chbx_green_hidden">
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Спорт (12)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Поездка на отдых (9)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Путешествие(27)</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="wrap_filter_chbx_orange">
                                            <ul class="filter_chbx_orange">
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Скалолазание (12)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Волейбол (41)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Футбол (3)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Бокс (12)</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" class="styler">
                                                        <span>Рыбалка (142)</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="hidden_filter_item">
                                        <div class="filter_key_words">
                                            <input type="text" class="typical_input_bordered" placeholder="Ключевые слова" />
                                            <div class="inner_search_select">
                                                <select>
                                                    <option>Россия, Москва</option>
                                                    <option>Другая страна...</option>
                                                    <option>Россия, Московская область</option>
                                                    <option>Россия, Санкт-Петербург</option>
                                                    <option>Россия. Ленинградская область</option>
                                                    <option>Другой город...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden_filter_item">
                                        <h4>Сортировать результаты</h4>
                                        <div class="filter_sort">
                                            <ul class="typical_chbx_orange">
                                                <li>
                                                    <label>
                                                        <input type="radio" class="styler" name="filter_sort"/>
                                                        <span>По релевантности</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="radio" class="styler" name="filter_sort"/>
                                                        <span>По популярности</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="radio" class="styler" name="filter_sort"/>
                                                        <span>По дате публикации</span>
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
                        </div>
                        <div class="companies_recomandations_inner_block">
                            <!-- companies_recomandations_item -->
                            <div class="companies_recomandations_item">
                                <a href="#" class="title_link">Реальные рыбаки</a>
                                <a href="#" class="companies_recomandations_img">
                                    <img src="/img/companies_rec/1.jpg" alt="">
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
                                    <img src="/img/companies_rec/2.jpg" alt="">
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
                                    <img src="/img/companies_rec/3.jpg" alt="">
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
                                    <img src="/img/companies_rec/4.jpg" alt="">
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
                                    <img src="/img/companies_rec/5.jpg" alt="">
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
                                    <img src="/img/companies_rec/6.jpg" alt="">
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
                                    <img src="/img/companies_rec/1.jpg" alt="">
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
                                    <img src="/img/companies_rec/2.jpg" alt="">
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
                                    <img src="/img/companies_rec/3.jpg" alt="">
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
                                    <img src="/img/companies_rec/4.jpg" alt="">
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
                                    <img src="/img/companies_rec/5.jpg" alt="">
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
                                    <img src="/img/companies_rec/6.jpg" alt="">
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
