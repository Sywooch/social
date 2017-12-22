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
                <a href="#" class="logo"><img src="/img/logo.png" alt=""></a>
                <div class="main_page_txt">
                    <p>Найди друзей по интересам и присоединяйся к компаниям!</p>
                </div>
                <?php if (empty($this->params['user'])):?>
                <div class="registration_form">
                    <div class="reg_form_top">
                        <input type="text" class="typical_input" placeholder="Имя">
                        <input type="email" class="typical_input" placeholder="Эл.почта">
                        <input type="password" class="typical_input" placeholder="Пароль">
                        <div class="typycal_select">
                            <select class="city-selector">
                                <option>Россия, Москва</option>
                                <option>Россия, Московская область</option>
                                <option>Россия, Санкт-Петербург</option>
                                <option>Россия. Ленинградская область</option>
                                <option value="else">Другой город...</option>
                            </select>
                        </div>
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
                        <div class="reg_sex">
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" class="styler" name="sex">
                                        <span>Муж</span>
                                    </label>

                                </li>
                                <li>
                                    <label>
                                        <input type="radio" class="styler" name="sex">
                                        <span>Жен</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="green_btn"><input type="submit" class="green_btn_txt" value="Зарегистрироваться"></div>
                </div>
                <?php endif;?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white sw_pag_1"></div>
        </div>
    </div>
    <div class="main_page_btm">
        <div class="container">
            <h2>Найди прямо сейчас</h2>
            <div class="main_search">
                <input type="text" class="white_input" placeholder="Волшебный поиск" />
                <div class="orange_btn">
                    <input type="submit" class="orange_btn_txt" value="Искать" />
                </div>
                <div class="search_hidden">
                    <div class="search_hidden_line">
                        <a href="#" class="search_hidden_txt">Выгуливание жены</a>
                    </div>
                    <div class="search_hidden_line">
                        <a href="#" class="search_hidden_txt">Выгуливание жены</a>
                    </div>
                    <div class="search_hidden_line">
                        <a href="#" class="search_hidden_txt">Выгуливание жены</a>
                    </div>
                </div>
            </div>
            <div class="tags_block">
                <a href="#" class="white_tag">просмотр футбола</a>
                <a href="#" class="white_tag">совместный бизнес</a>
                <a href="#" class="white_tag">обучение танцам</a>
                <a href="#" class="white_tag">открытие кафе</a>
                <a href="#" class="white_tag">настольный теннис</a>
                <button class="white_tags_pull"></button>
                <div class="tags_block_hidden">
                    <div class="tags_block_hidden_wrap">
                        <a href="#" class="white_tag">просмотр футбола</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                        <a href="#" class="white_tag">настольный теннис</a>
                        <a href="#" class="white_tag">совместный бизнес</a>
                        <a href="#" class="white_tag">обучение танцам</a>
                        <a href="#" class="white_tag">открытие кафе</a>
                    </div>
                </div>
            </div>
            <div class="main_btm_chbx">
                <ul class="white_chbx">
                    <li>
                        <label>
                            <input type="radio" name="main1" class="styler">
                            <span>В моем городе</span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="main1" class="styler">
                        </label>
                        <div class="white_select">
                            <select class="city-selector">
                                <option>Россия, Москва</option>
                                <option>Россия, Московская область</option>
                                <option>Россия, Санкт-Петербург</option>
                                <option>Россия. Ленинградская область</option>
                                <option value="else">Другой город...</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="main2" class="styler">
                            <span>Напарник</span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="main2" class="styler">
                            <span>Компания</span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="radio" name="main2" class="styler">
                            <span>Не важно</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="recent_search_results light_bg">
    <div class="container">
        <div class="title_block clearfix">
            <h2>Сейчас ищут в Москве:</h2>
            <div class="choose_city_block">

                <div class="typycal_select">
                    <select class="city-selector">
                        <option>Москва</option>
                        <option>Санкт-Петербург</option>
                        <option>Новосибирск</option>
                        <option>Екатеринбург</option>
                        <option>Нижний Новгород</option>
                        <option value="else">Другой город...</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="recent_search_block">

            <!-- recent_search_item -->
            <div class="recent_search_item">
                <a href="#" class="title_link">Посмотреть футбол</a>
                <span class="item_hint">Россия, Москва</span>
                <a href="#" class="recent_search_img">
                    <img src="/img/recent_search_prof/1.jpg" alt="">
                    <span class="photos_number_link">8</span>
                </a>
                <div class="recent_search_txt">
                    <p>Надоело пить пиво и смотреть футбольные матчи отдному, ищу того, кто тоже болеет за ЦСК!</p>
                    <span class="item_hint">Евгений, 36</span>
                </div>
                <div class="recent_search_item_tags">
                    <a href="#" class="grey_tag">футбол</a>
                    <a href="#" class="grey_tag">пиво</a>
                    <a href="#" class="grey_tag">кино</a>
                </div>
                <div class="recent_search_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                    <div class="group_number_block"><span class="group_number">23</span></div>
                </div>
            </div>

            <!-- recent_search_item -->
            <div class="recent_search_item">
                <a href="#" class="title_link">Сходить в театр</a>
                <span class="item_hint">Россия, Москва</span>
                <a href="#" class="recent_search_img">
                    <img src="/img/recent_search_prof/2.jpg" alt="">
                    <span class="photos_number_link">3</span>
                </a>
                <div class="recent_search_txt">
                    <p>Хочу сходить на премьеру спектакля “Короли и мыши” в Театр Маяковского, кто со мной!</p>
                    <span class="item_hint">Жанна, 22</span>
                </div>
                <div class="recent_search_item_tags">
                    <a href="#" class="grey_tag">театр</a>
                    <a href="#" class="grey_tag">музыка</a>
                </div>
                <div class="recent_search_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                    <div class="group_number_block"><span class="group_number">3268</span></div>
                </div>
            </div>

            <!-- recent_search_item -->
            <div class="recent_search_item">
                <a href="#" class="title_link">Съездить на рыбалку</a>
                <span class="item_hint">Россия, Москва</span>
                <a href="#" class="recent_search_img">
                    <img src="/img/recent_search_prof/3.jpg" alt="">
                    <span class="photos_number_link">12</span>
                </a>
                <div class="recent_search_txt">
                    <p>В выходные еду на весь день на рыбалку на Южное озеро 30 км от Москвы, пацаны присоединяйтесь :)</p>
                    <span class="item_hint">Олег, 27</span>
                </div>
                <div class="recent_search_item_tags">
                    <a href="#" class="grey_tag">рыбалка</a>
                </div>
                <div class="recent_search_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                    <div class="group_number_block"><span class="group_number">9</span></div>
                </div>
            </div>

            <!-- recent_search_item -->
            <div class="recent_search_item">
                <a href="#" class="title_link">Поиграть в Playstation</a>
                <span class="item_hint">Россия, Москва</span>
                <a href="#" class="recent_search_img">
                    <img src="/img/recent_search_prof/4.jpg" alt="">
                    <span class="photos_number_link">1</span>
                </a>
                <div class="recent_search_txt">
                    <p>Чуваки!! Давайте зарубимся у меня дома или по сетке в Need For Speed: Rivals!</p>
                    <span class="item_hint">Евгений, 36</span>
                </div>
                <div class="recent_search_item_tags">
                    <a href="#" class="grey_tag">playstation</a>
                    <a href="#" class="grey_tag">пиво</a>
                    <button class="grey_tag more_gr_tags">...</button>
                    <div class="hidden_gr_tags">
                        <div class="wrap_h_gr_tags">
                            <a href="#" class="grey_tag">playstation</a>
                            <a href="#" class="grey_tag">пиво</a>
                        </div>
                    </div>
                </div>
                <div class="recent_search_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Присоединиться</span></a>
                    <div class="group_number_block"><span class="group_number">180</span></div>
                </div>
            </div>
        </div>
        <div class="block_btm clearfix">
            <a href="#" class="add_button">Добавить объявление</a>
            <a href="#" class="more_link">Еще 2137 объявлений</a>
        </div>
    </div>
</section>
<section class="companies_recomandations">
    <div class="container">
        <div class="title_block clearfix">
            <h2>Присоединяйтесь к компаниям:</h2>
        </div>
        <div class="companies_recomandations_block">

            <!-- companies_recomandations_item -->
            <div class="companies_recomandations_item">
                <a href="#" class="title_link">Реальные рыбаки</a>
                <a href="#" class="companies_recomandations_img">
                    <img src="/img/companies_rec/1.jpg" alt="">
                    <span class="view_ic"></span>
                </a>
                <div class="companies_recomandations_item_tags">
                    <a href="#" class="grey_tag">рыбалка</a>
                    <a href="#" class="grey_tag">пиво</a>
                    <a href="#" class="grey_tag">водка</a>
                </div>
                <div class="companies_recomandations_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                    <div class="already_joined_block"><p>Присоединились человек</p><span class="joined_number">529</span></div>
                </div>
            </div>

            <!-- companies_recomandations_item -->
            <div class="companies_recomandations_item">
                <a href="#" class="title_link">Мы - Толкинисты!!!</a>
                <a href="#" class="companies_recomandations_img">
                    <img src="/img/companies_rec/2.jpg" alt="">
                    <span class="view_ic"></span>
                </a>
                <div class="companies_recomandations_item_tags">
                    <a href="#" class="grey_tag">фентези</a>
                    <a href="#" class="grey_tag">драконы</a>
                    <a href="#" class="grey_tag">сражения</a>
                    <a href="#" class="grey_tag">книги</a>
                    <a href="#" class="grey_tag">косплей</a>
                </div>
                <div class="companies_recomandations_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                    <div class="already_joined_block"><p>Присоединились человек</p><span class="joined_number">2156</span></div>
                </div>
            </div>

            <!-- companies_recomandations_item -->
            <div class="companies_recomandations_item">
                <a href="#" class="title_link">Пейте Пиво Пацаны :)</a>
                <a href="#" class="companies_recomandations_img">
                    <img src="/img/companies_rec/3.jpg" alt="">
                    <span class="view_ic"></span>
                </a>
                <div class="companies_recomandations_item_tags">
                    <a href="#" class="grey_tag">пиво</a>
                </div>
                <div class="companies_recomandations_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                    <div class="already_joined_block"><p>Присоединились человек</p><span class="joined_number">8727</span></div>
                </div>
            </div>

            <!-- companies_recomandations_item -->
            <div class="companies_recomandations_item">
                <a href="#" class="title_link">Мы любим сиськи!</a>
                <a href="#" class="companies_recomandations_img">
                    <img src="/img/companies_rec/4.jpg" alt="">
                    <span class="view_ic"></span>
                </a>
                <div class="companies_recomandations_item_tags">
                    <a href="#" class="grey_tag">женщины</a>
                    <a href="#" class="grey_tag">сиськи</a>
                    <a href="#" class="grey_tag">клубничка</a>
                </div>
                <div class="companies_recomandations_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                    <div class="already_joined_block"><p>Присоединились человек</p><span class="joined_number">34529</span></div>
                </div>
            </div>

            <!-- companies_recomandations_item -->
            <div class="companies_recomandations_item">
                <a href="#" class="title_link">НЕ здоровое питание</a>
                <a href="#" class="companies_recomandations_img">
                    <img src="/img/companies_rec/5.jpg" alt="">
                    <span class="view_ic"></span>
                </a>
                <div class="companies_recomandations_item_tags">
                    <a href="#" class="grey_tag">еда</a>
                    <a href="#" class="grey_tag">питание</a>
                    <a href="#" class="grey_tag">мясо</a>
                    <a href="#" class="grey_tag">кухня</a>
                    <a href="#" class="grey_tag">фастфуд</a>
                    <a href="#" class="grey_tag">пельмени</a>
                    <a href="#" class="grey_tag">пиво</a>
                    <button class="grey_tag more_gr_tags">...</button>
                    <div class="hidden_gr_tags">
                        <div class="wrap_h_gr_tags">
                            <a href="#" class="grey_tag">playstation</a>
                            <a href="#" class="grey_tag">пиво</a>
                        </div>
                    </div>
                </div>
                <div class="companies_recomandations_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                    <div class="already_joined_block"><p>Присоединились человек</p><span class="joined_number">3132</span></div>
                </div>
            </div>

            <!-- companies_recomandations_item -->
            <div class="companies_recomandations_item">
                <a href="#" class="title_link">Выгуливатели собак</a>
                <a href="#" class="companies_recomandations_img">
                    <img src="/img/companies_rec/6.jpg" alt="">
                    <span class="view_ic"></span>
                </a>
                <div class="companies_recomandations_item_tags">
                    <a href="#" class="grey_tag">собаки</a>
                    <a href="#" class="grey_tag">животные</a>
                    <a href="#" class="grey_tag">прогулки</a>
                    <a href="#" class="grey_tag">дерьмо</a>
                </div>
                <div class="companies_recomandations_item_btm">
                    <a href="#" class="green_btn"><span class="green_btn_txt">Смотреть</span></a>
                    <div class="already_joined_block"><p>Присоединились человек</p><span class="joined_number">547</span></div>
                </div>
            </div>
        </div>
        <div class="block_btm clearfix">
            <a href="#" class="add_button">Создать компанию</a>
            <a href="#" class="more_link">Еще 1724 компаний</a>
        </div>
    </div>
</section>

<div style="display: none;">
    <div class="box-modal city_modal">
        <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
        <div class="modal">
            <div class="city_modal_top">
                <h4>Россия</h4>
                <a href="#">Сменить страну</a>
                <input type="text" class="typical_input_bordered" />
            </div>
            <div class="city_modal_btm">
                <ul>
                    <li><a href="#">Москва</a></li>
                    <li><a href="#">Подольск</a></li>
                    <li><a href="#">Коломна</a></li>
                    <li><a href="#">Зеленоград</a></li>
                    <li class="city_letter">А</li>
                    <li><a href="">Россия</a></li>
                    <li><a href="">Австрия</a></li>
                    <li><a href="">Азербайджан</a></li>
                    <li><a href="">Албания</a></li>
                    <li><a href="">Алжир</a></li>
                    <li><a href="">Ангола</a></li>
                    <li><a href="">Андорра</a></li>
                    <li><a href="">Антигуа</a></li>
                    <li><a href="">Антигуа</a></li>
                    <li class="city_letter">Б</li>
                    <li><a href="">Россия</a></li>
                    <li><a href="">Австрия</a></li>
                    <li><a href="">Азербайджан</a></li>
                    <li><a href="">Албания</a></li>
                    <li><a href="">Алжир</a></li>
                    <li><a href="">Ангола</a></li>
                    <li><a href="">Андорра</a></li>
                    <li><a href="">Антигуа</a></li>
                    <li class="city_letter">В</li>
                    <li><a href="">Москва</a></li>
                    <li><a href="">Подольск</a></li>
                    <li><a href="">Коломна</a></li>
                    <li><a href="">Зеленоград</a></li>
                    <li class="city_letter">г</li>
                    <li><a href="">Россия</a></li>
                    <li><a href="">Австрия</a></li>
                    <li><a href="">Азербайджан</a></li>
                    <li><a href="">Албания</a></li>
                    <li><a href="">Алжир</a></li>
                    <li><a href="">Ангола</a></li>
                    <li><a href="">Андорра</a></li>
                    <li><a href="">Антигуа</a></li>
                    <li class="city_letter">д</li>
                    <li><a href="">Москва</a></li>
                    <li><a href="">Подольск</a></li>
                    <li><a href="">Коломна</a></li>
                    <li><a href="">Зеленоград</a></li>
                    <li class="city_letter">е</li>
                    <li><a href="">Россия</a></li>
                    <li><a href="">Австрия</a></li>
                    <li><a href="">Азербайджан</a></li>
                    <li><a href="">Албания</a></li>
                    <li><a href="">Алжир</a></li>
                    <li><a href="">Ангола</a></li>
                    <li><a href="">Андорра</a></li>
                    <li><a href="">Антигуа</a></li>
                    <li class="city_letter">ж</li>
                    <li><a href="">Москва</a></li>
                    <li><a href="">Подольск</a></li>
                    <li><a href="">Коломна</a></li>
                    <li><a href="">Зеленоград</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>