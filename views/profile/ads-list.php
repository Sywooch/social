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
        <h1><?= \Yii::t('app', 'Мои объявления');?></h1>
        <a href="<?= Url::to('/profile/create-ads')?>" class="add_button"><?= \Yii::t('app', 'Создать новое');?></a>
    </div>
    <div class="companies_content">
        <div class="announcement_inner_block">
            <div class="announcement_inner_block_active">
                <h2>Активные объявления</h2>
                <!-- announcement_inner_block_item -->
                <div class="announcement_inner_block_item clearfix">
                    <div class="announcement_item_txt">
                        <span class="announcement_ic"></span>
                        <h3>Съездить за город на выходные</h3>
                        <p>Драматизм, на первый взгляд, выстраивает реализм. Мимезис диссонирует сангвиник, что-то подобное можно встретить в работах Ауэрбаха и Тандлера. Реализм готично диссонирует эпитет. Возвышенное постоянно. Аполлоновское начало, в первом приближении, начинает неизменный канон биографии. Эзотерическое начинает классический реализм, таким образом, сходные законы контрастирующего развития характерны и для процессов в психике.</p>
                        <a href="#" class="green_btn raise_link">
                            <span class="green_btn_txt">Поднять на 1 место</span>
                        </a>
                        <a href="#" class="hide_link">Снять с публикации</a>
                        <p><b>Объявление на 276 месте в категории “Спорт”</b></p>
                        <a href="#" class="edit_link">Редактировать</a>


                        <!--       announcement_mod            -->

                        <div style="display: none;">
                            <div class="box-modal announcement_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="ann_mod_top">
                                        <h3>Поднятие объявления на 1 место</h3>
                                        <div class="ann_mod_img">
                                            <img src="img/ann_popup.jpg" alt="">
                                        </div>
                                        <span class="green_txt">Стоимость: 500 руб.</span>
                                    </div>
                                    <div class="ann_mod_btm">
                                        <h3>Способ оплаты:</h3>
                                        <div class="ann_mod_pay">
                                            <a href="#" class="pay_link"><img src="img/pay/1.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/2.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/3.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/4.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/5.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="announce_item_info">
                        <h4>Создано </h4>
                        <p>23.04.2015</p>
                        <h4>Просмотров </h4>
                        <p>7855</p>
                    </div>

                </div>
                <!-- announcement_inner_block_item -->
                <div class="announcement_inner_block_item clearfix">
                    <div class="announcement_item_txt">
                        <span class="announcement_ic"></span>
                        <h3>Съездить за город на выходные</h3>
                        <p>Возвышенное постоянно. Аполлоновское начало, в первом приближении, начинает неизменный канон биографии. Эзотерическое начинает классический реализм, таким образом, сходные законы контрастирующего развития характерны и для процессов в психике.</p>
                        <a href="#" class="green_btn raise_link">
                            <span class="green_btn_txt">Поднять на 1 место</span>
                        </a>
                        <a href="#" class="hide_link">Снять с публикации</a>
                        <p><b>Объявление поднято в поиске.</b></p>
                        <p><b>Повторное поднятие возможно через 8 часов.</b></p>
                        <a href="#" class="edit_link">Редактировать</a>
                        <!--       announcement_mod            -->

                        <div style="display: none;">
                            <div class="box-modal announcement_mod">
                                <div class="box-modal_close arcticmodal-close"><i class="flaticon-close"></i></div>
                                <div class="modal">
                                    <div class="ann_mod_top">
                                        <h3>Поднятие объявления на 1 место</h3>
                                        <div class="ann_mod_img">
                                            <img src="img/ann_popup.jpg" alt="">
                                        </div>
                                        <span class="green_txt">Стоимость: 500 руб.</span>
                                    </div>
                                    <div class="ann_mod_btm">
                                        <h3>Способ оплаты:</h3>
                                        <div class="ann_mod_pay">
                                            <a href="#" class="pay_link"><img src="img/pay/1.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/2.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/3.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/4.jpg" alt=""></a>
                                            <a href="#" class="pay_link"><img src="img/pay/5.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="announce_item_info">
                        <h4>Создано </h4>
                        <p>23.04.2015</p>
                        <h4>Просмотров </h4>
                        <p>7855</p>
                    </div>


                </div>
            </div>
            <div class="announcement_inner_block_archive">
                <h2>Объявления в архиве</h2>
                <!-- announcement_inner_block_item -->
                <div class="announcement_inner_block_item clearfix">
                    <div class="announcement_item_txt">
                        <span class="announcement_ic"></span>
                        <h3>Ищу напарника на скалодром</h3>
                        <p>Выразительное иллюстрирует онтогенез. Прекрасное, на первый взгляд, иллюстрирует незначительный онтогенез, однако само по себе состояние игры всегда амбивалентно. Декаданс, в первом приближении, неизменяем.</p>
                        <a href="#" class="green_btn">
                            <span class="green_btn_txt">Опубликовать</span>
                        </a>
                        <a href="#" class="green_btn">
                            <span class="green_btn_txt">Опубликовать и поднять на 1 место</span>
                        </a>
                        <p><b>Объявление на 276 месте в категории “Спорт”</b></p>
                        <a href="#" class="edit_link">Редактировать</a>
                    </div>
                    <div class="announce_item_info">
                        <h4>Добавлено </h4>
                        <p>23.04.2015</p>
                        <h4>Просмотров </h4>
                        <p>7855</p>
                    </div>
                </div>

                <!-- announcement_inner_block_item -->
                <div class="announcement_inner_block_item clearfix">
                    <div class="announcement_item_txt">
                        <span class="announcement_ic"></span>
                        <h3>Ищу напарника на скалодром</h3>
                        <p>Выразительное иллюстрирует онтогенез. Прекрасное, на первый взгляд, иллюстрирует незначительный онтогенез, однако само по себе состояние игры всегда амбивалентно. Декаданс, в первом приближении, неизменяем.</p>
                        <a href="#" class="green_btn">
                            <span class="green_btn_txt">Написать напарнику</span>
                        </a>
                        <p><b>Объявление на 276 месте в категории “Спорт”</b></p>
                        <a href="#" class="edit_link">Редактировать</a>
                    </div>
                    <div class="announce_item_info">
                        <h4>Добавлено </h4>
                        <p>23.04.2015</p>
                        <h4>Просмотров </h4>
                        <p>7855</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
            <div class="decorations_companies">
                            <span class="dec_ann_left_1">
                                <img src="/img/decor/decor_ann_l_1.png" alt="">
                            </span>
                <span class="dec_ann_right_1">
                                <img src="/img/decor/decor_ann_r_1.png" alt="">
                            </span>
            </div>
        </div>

    </div>
</section>
