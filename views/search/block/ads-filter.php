<div class="search_page_filter ads">
    <div class="search_page_filter_item">
        <div class="container">
            <div class="hidden_filter_item">
                <h4><?= \Yii::t('app', 'Выберите подходящую тему')?></h4>
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
        </div>

    </div>
    <div class="search_page_filter_item">
        <div class="container">
            <div class="new_company_line">
                <h4>Параметры</h4>
                <ul class="typical_chbx_orange">
                    <li>
                        <span class="form_line_title">Вес</span>
                        <div class="typical_select_bordered">
                            <select>
                                <option> </option>
                                <option>100</option>
                                <option>200</option>
                                <option>300</option>
                                <option>400</option>
                            </select>
                        </div>
                        <span class="form_line_title">кг</span>
                    </li>
                    <li>
                        <span class="form_line_title">Уровень</span>
                        <div class="typical_select_bordered">
                            <select>
                                <option> </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" class="styler">
                            <span>Не Скалодром</span>
                        </label>
                    </li>
                    <li>
                        <label>
                            <input type="checkbox" class="styler">
                            <span>Поездка на скалы</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="new_company_line">
                <ul class="typical_chbx_orange">
                    <li><span class="form_line_title">С кем</span></li>
                    <li>
                        <label>
                            <input type="checkbox" class="styler">
                            <span>Женщина</span>
                        </label>

                    </li>
                    <li>
                        <label>
                            <input type="checkbox" class="styler">
                            <span>Мужчина</span>
                        </label>

                    </li>
                    <li>
                        <label>
                            <input type="checkbox" class="styler">
                            <span>Компания</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="new_company_line">
                <ul class="typical_chbx_orange birth_date_chosen_wrap">
                    <li><span class="form_line_title">Когда</span></li>
                    <li>
                        <label class="birth_date_chosen">
                            <input type="radio" class="styler" name="new_date">
                        </label>
                        <div class="typical_birth_date">
                            <button class="birth_date_pull">Выбрать дату</button>
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
                    </li>
                    <li>
                        <label class="birth_date_chosen2">
                            <input type="radio" class="styler" name="new_date">
                            <span>Решим вместе</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="new_company_line">
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
        </div>
    </div>
    <div class="search_page_filter_item">
        <div class="container">
            <div class="hidden_filter_item">
                <h4>Сортировать результаты</h4>
                <div class="filter_sort">
                    <ul class="typical_chbx_orange">
                        <li>
                            <label>
                                <input type="radio" class="styler" name="filter_sort" checked/>
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