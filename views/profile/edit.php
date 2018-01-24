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
                            <div class="profile_quote profile_quote_edit profile_quote_m">
                                <input type="text" class="typical_input_bordered" value="<?= $this->params['user']->title?>">
                                <div class="green_btn">
                                    <input type="submit" class="green_btn_txt" value="ОК" />
                                </div>
                                <button class="edit_btn edit_btn_blue"><i class="flaticon-draw"></i></button>
                            </div>
                            <table class="profile_info">
                                <tbody>
                                <tr>
                                    <td><?= \Yii::t('app', 'Страна, Город')?></td>
                                    <td>
                                        <div class="typical_select_bordered">
                                            <select>
                                                <option value="<?= $this->params['user']->city->id?>"><?= $this->params['user']->city->area->country->translation->name?>, <?= $this->params['user']->city->translation->name?></option>
                                                <option><?= \Yii::t('app', 'Другой город')?>...</option>
                                            </select>
                                        </div>
                                        <button class="edit_btn edit_btn_blue"><i class="flaticon-draw"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Языки</td>
                                    <td>Русский, Немецкий
                                        <div class="inner_search_select">
                                            <select>
                                                <option>Добавить язык</option>
                                                <option>Аварский</option>
                                                <option>Адыгейский</option>
                                                <option>Азербайджанский</option>
                                                <option>Аккадский</option>
                                                <option>Албанский</option>
                                                <option>Алеутский</option>
                                                <option>Алюторский</option>
                                                <option>Болгарский</option>
                                                <option>Бурский</option>
                                                <option>Аварский</option>
                                                <option>Адыгейский</option>
                                                <option>Азербайджанский</option>
                                                <option>Аккадский</option>
                                                <option>Албанский</option>
                                                <option>Алеутский</option>
                                                <option>Алюторский</option>
                                                <option>Болгарский</option>
                                                <option>Бурский</option>
                                                <option>Аварский</option>
                                                <option>Адыгейский</option>
                                                <option>Азербайджанский</option>
                                                <option>Аккадский</option>
                                                <option>Албанский</option>
                                                <option>Алеутский</option>
                                                <option>Алюторский</option>
                                                <option>Болгарский</option>
                                                <option>Бурский</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>День рождения</td>
                                    <td>
                                        <div class="typical_birth_date">
                                            <button class="birth_date_pull">День рождения</button>
                                            <div class="birth_date_hidden">
                                                <div class="birth_date_coll birth_date_day typical_scroll">
                                                    <ul class="birht_date_chbx">
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>1</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>2</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>3</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>4</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>5</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>6</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>7</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>8</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>9</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>10</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>11</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>12</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>13</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>14</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>15</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>16</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>17</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>18</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>19</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>20</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>21</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>22</span>
                                                            </label></li>
                                                        <li> <label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>23</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>24</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>25</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>26</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>27</span>
                                                            </label></li>
                                                        <l><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>28</span>
                                                            </label></l>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>29</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>30</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_day">
                                                                <span>31</span>
                                                            </label></li>
                                                    </ul>
                                                </div>
                                                <div class="birth_date_coll birth_date_coll_month typical_scroll">
                                                    <ul class="birht_date_chbx">
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Январь</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Февраль</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Март</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Апрель</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Май</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Июнь</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Июль</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Август</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Сентябрь</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Октябрь</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Ноябрь</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_month">
                                                                <span>Декабрь</span>
                                                            </label></li>
                                                    </ul>
                                                </div>
                                                <div class="birth_date_coll birth_date_coll_year typical_scroll">
                                                    <ul class="birht_date_chbx">
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1980</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1981</span>
                                                            </label></li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1982</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1983</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1984</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1985</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1986</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1987</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1988</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1989</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1990</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1991</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1992</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1993</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1994</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1995</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1996</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1997</span>
                                                            </label>
                                                        </li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1998</span>
                                                            </label></li>
                                                        <li> <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>1999</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2000</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2001</span>
                                                            </label></li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2002</span>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2003</span>
                                                            </label>
                                                        </li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2004</span>
                                                            </label></li>
                                                        <li> <label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2005</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2006</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2007</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2008</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2009</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2010</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2011</span>
                                                            </label></li>
                                                        <li><label>
                                                                <input type="radio" class="styler" name="b_year">
                                                                <span>2012</span>
                                                            </label></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
                                    <td>О себе</td>
                                    <td>
                                        <textarea class="typical_input_bordered">Диониссийское начало диссонирует элитарный меланхолик. Возрождение изящно начинает архетип. Богатство мировой литературы от Платона до Ортеги-и-Гассета свидетельствует о том, что художественный идеал изящно дает холерик</textarea>
                                        <div class="green_btn">
                                            <input type="submit" class="green_btn_txt" value="Сохранить" />
                                        </div>
                                        <button class="edit_btn edit_btn_blue"><i class="flaticon-draw"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="main_profile_photos">
                                <div class="profile_slider">
                                    <div class="swiper-container profile_slider_main">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="announcement_img">
                                                    <img src="/img/profille_friend.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next sw_next_1"></div>
                                </div>
                                <a href="#" class="album_link">Все фотографии (14)</a>
                            </div>
                        </div>
                        <div class="categories_block">
                            <div class="categories_topline">
                                <button class="edit_btn edit_btn_blue"><i class="flaticon-draw"></i></button>
                                <p>Интересы</p>
                                <ul class="filter_chbx_orange filter_chbx_orange_cancel">
                                    <li>
                                        <label>
                                            <input type="checkbox" class="styler" checked>
                                            <span>Скалодром</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" class="styler">
                                            <span>Экстрим</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap_categories clearfix">
                                <!--       goal_modal            -->

                                <div style="display: none;">
                                    <div class="box-modal goal_modal">
                                        <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                        <div class="modal">
                                            <div class="goal_mod">
                                                <h4>Добавление интересов</h4>
                                                <textarea class="typical_input_bordered" placeholder="Перечислите через запятую"></textarea>
                                                <div class="green_btn">
                                                    <input type="submit" class="green_btn_txt" value="Добавить" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="categories_list">
                                    <li class="categories_list_pull categories_list_pull_1">Спорт</li>
                                    <li class="categories_list_pull categories_list_pull_2">Путешествие</li>
                                    <li class="categories_list_pull categories_list_pull_3">Работа, бизнес</li>
                                    <li class="categories_list_pull categories_list_pull_4">Знакомства</li>
                                    <li class="categories_list_pull categories_list_pull_5">Прогулка</li>
                                    <li class="categories_list_pull categories_list_pull_6">Игры</li>
                                    <li class="categories_list_pull categories_list_pull_7">Обучение</li>
                                    <li class="categories_list_pull categories_list_pull_8">Попить кофе</li>
                                    <li class="categories_list_pull categories_list_pull_9">Снять жилье</li>
                                    <li class="categories_list_pull categories_list_pull_10">Выпить</li>
                                    <li class="categories_list_pull categories_list_pull_11">Переписка</li>
                                    <li class="categories_list_pull"><a class="category_modal_link"  onclick="$('.goal_modal').arcticmodal()">Добавьте свою</a></li>
                                </ul>
                                <div class="categories_hidden">
                                    <div class="main_search interests_search interests_search_left">
                                        <input type="text" class="white_input" placeholder="Волшебный поиск" />
                                        <input type="submit" class="search_btn"/>
                                        <div class="search_hidden">
                                            <div class="search_hidden_line_interest">
                                                <button class="add_interest"><i class="flaticon-cross"></i></button>
                                                <a href="#" class="search_hidden_txt">Жрачка</a>
                                            </div>
                                            <div class="search_hidden_line_interest">
                                                <button class="add_interest"><i class="flaticon-cross"></i></button>
                                                <a href="#" class="search_hidden_txt">Бухло</a>
                                            </div>
                                            <div class="search_hidden_line_interest">
                                                <button class="add_interest"><i class="flaticon-cross"></i></button>
                                                <a href="#" class="search_hidden_txt">Китайская кухня</a>
                                            </div>
                                            <div class="search_hidden_line_interest">
                                                <button class="add_interest"><i class="flaticon-cross"></i></button>
                                                <a href="#" class="search_hidden_txt">Полезная еда</a>
                                            </div>
                                            <div class="search_hidden_line_interest">
                                                <button class="add_interest"><i class="flaticon-cross"></i></button>
                                                <a href="#" class="search_hidden_txt">Японская кухня</a>
                                            </div>
                                            <div class="search_hidden_line_interest">
                                                <button class="add_interest"><i class="flaticon-cross"></i></button>
                                                <a href="#" class="search_hidden_txt">Японская кухня</a>
                                            </div>
                                            <div class="search_hidden_line_interest">
                                                <a class="category_modal_link"  onclick="$('.goal_modal').arcticmodal()">Добавьте свою</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="category_item category_item_1">
                                        <h4>Спорт</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler" checked>
                                                    <span>Скалолазание</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler" checked>
                                                    <span>Волейбол</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Футбол</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Бокс</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Рыбалка</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_2">
                                        <h4>Путешествие</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>За границу</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>По России</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Секстуризм</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler" checked>
                                                    <span>Проститутки</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Наркота</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Музеи</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Достопримечательности</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Бухать ежедневно</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Шоппинг</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Воровство и разбой</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_3">
                                        <h4>Работа, бизнес</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>В офисе</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Фриланс</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Свой бизнес</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Чужой бизнес</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Продажа рабов</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_4">
                                        <h4>Знакомства</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Знакомства</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_5">
                                        <h4>Прогулка</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Прогулка</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_6">
                                        <h4>Игры</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Игры</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_7">
                                        <h4>Обучение</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Обучение</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_8">
                                        <h4>Попить кофе</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Попить кофе</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_9">
                                        <h4>Снять жилье</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Снять жилье</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_10">
                                        <h4>Выпить</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Выпить</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="category_item category_item_11">
                                        <h4>Переписка</h4>
                                        <ul class="filter_chbx_orange">
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="styler">
                                                    <span>Переписка</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="green_btn">
                                <input type="submit" class="green_btn_txt" value="Сохранить" />
                            </div>
                        </div>
                        <div class="profile_block_wall">
                            <div class="wall_post wall_post_user">
                                <div class="wall_post_top clearfix">
                                    <div class="wall_post_sett">
                                        <button class="edit_btn"><i class="flaticon-draw"></i></button>
                                        <button class="basket_btn"><i class="flaticon-garbage"></i></button>
                                    </div>
                                    <a href="#" class="profile_photo_link">
                                        <img src="/img/profille_friend.jpg" alt="">
                                    </a>
                                    <div class="wall_post_txt">

                                        <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                            меня честь и удовольствие работать с такой замечательной и
                                            очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                        <a href="#" class="wall_post_img wall_post_img_link">
                                            <img src="/img/profile_company_post.jpg" alt="">
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
                                                                                <img src="/img/profile_company_post.jpg" alt="">
                                                                            </span>
                                                                <div class="wall_post_modal_txt clearfix">
                                                                    <a href="#" class="profile_photo_link">
                                                                        <img src="/img/profille_friend.jpg" alt="">
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
                            </div>

                            <div class="wall_post wall_post_user">
                                <div class="wall_post_sett">
                                    <button class="edit_btn"><i class="flaticon-draw"></i></button>
                                    <button class="basket_btn"><i class="flaticon-garbage"></i></button>
                                </div>
                                <div class="wall_post_top clearfix">
                                    <a href="#" class="profile_photo_link">
                                        <img src="/img/profille_friend.jpg" alt="">
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
                                <div class="wall_post_sett">
                                    <button class="edit_btn"><i class="flaticon-draw"></i></button>
                                    <button class="basket_btn"><i class="flaticon-garbage"></i></button>
                                </div>
                                <div class="wall_post_top clearfix">
                                    <a href="#" class="profile_photo_link">
                                        <img src="/img/profille_friend.jpg" alt="">
                                    </a>
                                    <div class="wall_post_txt">
                                        <p class="deleted_post">Запись удалена. <a href="#">Восстановить</a></p>
                                        <div class="wall_post_links clearfix">
                                            <div class="wall_post_links_left">
                                                <p>19 января 2015</p>
                                            </div>
                                            <div class="wall_post_links_likes wall_post_links_likes_disabled">
                                                <span>0</span>
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
                                        <img src="/img/profille_friend.jpg" alt="">
                                    </a>
                                    <div class="wall_post_txt">
                                        <p>Мероприятие невиданного охвата и с колоссальной идеей. Для
                                            меня честь и удовольствие работать с такой замечательной и
                                            очень молодой командой. То, что мы сделали за эти несколько месяцев, — это настоящий подвиг. Коля , Мари , спасибо вам, что привлекли. Работать в коллективе людей, для которых нет невыполнимых задач, - это самый лучший опыт.</p>
                                        <a href="#" class="wall_post_img wall_post_img_link">
                                            <img src="/img/profile_company_post.jpg" alt="">
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
                                                                                <img src="/img/profile_company_post.jpg" alt="">
                                                                            </span>
                                                                <div class="wall_post_modal_txt clearfix">
                                                                    <a href="#" class="profile_photo_link">
                                                                        <img src="/img/profille_friend.jpg" alt="">
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
                            <img src="/img/profille_friend.jpg" alt="">
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
                                                                <img src="/img/crop.jpg" alt="">
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
                        <div class="partner_block">
                            <h3>Ищу напарника</h3>
                            <ul>
                                <li><a href="#">Поебаца дома</a><div class="group_number_block"><span class="group_number">1240</span></div><a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a></li>
                                <li><a href="#">Съездить за город на выходные</a><div class="group_number_block"><span class="group_number">1240</span></div><a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a></li>
                                <li><a href="#">Поебаца в лифте</a><div class="group_number_block group_number_block_joined"><span class="group_number">1240</span></div><a href="#" class="bordered_btn">Отменить</a></li>
                            </ul>
                        </div>
                        <div class="side_companies">
                            <h3>Мои компании</h3>
                            <!-- companies_recomandations_item -->
                            <div class="companies_recomandations_item side_companies_recomandations_item">
                                <a href="#" class="title_link">Жизнь - тлен</a>
                                <a href="#" class="companies_recomandations_img">
                                    <img src="/img/companies_rec/1.jpg" alt="">
                                    <span class="view_ic"></span>
                                </a>
                                <div class="recent_search_item_btm">
                                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                                    <div class="group_number_block"><span class="group_number">1240</span></div>
                                </div>
                            </div>
                            <!-- companies_recomandations_item -->
                            <div class="companies_recomandations_item side_companies_recomandations_item">
                                <a href="#" class="title_link">Жизнь - тлен</a>
                                <a href="#" class="companies_recomandations_img">
                                    <img src="/img/companies_rec/1.jpg" alt="">
                                    <span class="view_ic"></span>
                                </a>
                                <div class="recent_search_item_btm">
                                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                                    <div class="group_number_block"><span class="group_number">1240</span></div>
                                </div>
                            </div>
                            <a href="#" class="prof_all_link">еще 27 компаний</a>
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
