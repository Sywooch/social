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
                    <p><?= \Yii::t('app', 'Найди друзей по интересам и присоединяйся к компаниям')?>!</p>
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
            <h2><?= \Yii::t('app', 'Сейчас ищут в')?> Москве:</h2>
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
        <?php if (!empty($ads)):?>
            <?php foreach ($ads as $element):?>
                <!-- recent_search_item -->
                <div class="recent_search_item">
                    <a href="<?= Url::to('/public/ads/' . $element->id)?>" class="title_link"><?= $element->title ?></a>
                    <span class="item_hint"><?= $element->city->country->translation->name?>, <?= $element->city->translation->name?></span>
                    <a href="<?= Url::to('/public/profile/' . $element->customer->id)?>" class="recent_search_img">
                        <img src="/uploads/<?= $element->customer->id?>/<?= $element->customer->mainImage->file?>" alt="">
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