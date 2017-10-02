<?= $this->render('//site/block/search', []); ?>

<section class="main_container light_bg">
    <div class="container">
        <div class="title_block step_title_block clearfix">
            <h1><span><?= \Yii::t('app', 'Шаг')?> 2:</span> <?= \Yii::t('app', 'Расскажите немного о себе, Имя')?></h1>
        </div>

        <div class="step_block">
            <div class="step_block_avatar">
                <h3><?= \Yii::t('app', 'Необходимо выбрать фото профиля')?></h3>
                <div class="wrap_step_block_ava">
                    <div class="step_photo_top">
                        <div class="step_photo_i_img">
                        </div>

                    </div>
                    <div class="green_btn">
                        <input type="file" class="styler">
                    </div>
                </div>
            </div>
            <div class="interests_block">
                <h3>Мои интересы</h3>
                <div class="wrap_categories clearfix">
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
                    </ul>
                    <div class="categories_hidden">
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
            </div>

            <div class="step_languages step_languages_type2">
                <h3>Знаю языки</h3>
                <ul>
                    <li><a href="#">Русский</a><button class="delete_btn"><i class="flaticon-close-cross"></i></button></li>
                    <li><a href="#">Английский</a><button class="delete_btn"><i class="flaticon-close-cross"></i></button></li>
                    <li><a href="#">Французский</a><button class="delete_btn"><i class="flaticon-close-cross"></i></button></li>
                </ul>
                <div class="typical_select_bordered">
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
            </div>
            <div class="step_info_btm step_info_btm_type_2">
                <h3>О себе</h3>
                <div class="step_info_form clearfix">
                    <textarea class="typical_input_bordered"></textarea>
                    <div class="green_bg_hint">
                        <p>Обязательно напишите о себе</p>
                        <p>Это поможет другим лучше
                            узнать вас!</p>
                    </div>

                </div>
                <p class="form_mistake_txt">Не ленитесь, напишите хоть что-нибудь :)</p>
                <div class="green_btn">
                    <input type="submit" class="green_btn_txt" value="Зарегистрироваться" />
                </div>
            </div>
        </div>
        <div class="decorations_steps">
                        <span class="dec_steps_left_1">
                            <img src="img/decor/decor_steps_l_1.png" alt="">
                        </span>
            <span class="dec_steps_right_1">
                            <img src="img/decor/decor_steps_r_1.png" alt="">
                        </span>
        </div>
    </div>
</section>
