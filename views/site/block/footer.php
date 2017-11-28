<footer>
    <div class="container clearfix">
        <div class="wrap_social_foot">
            <h3><?= \Yii::t('app', 'Поддержи нас')?>!</h3>
            <div class="social_foot">
                <a href="#"><img src="/img/soc_foot/1.png" alt=""></a>
                <a href="#"><img src="/img/soc_foot/2.png" alt=""></a>
                <a href="#"><img src="/img/soc_foot/3.png" alt=""></a>
                <a href="#"><img src="/img/soc_foot/4.png" alt=""></a>
                <a href="#"><img src="/img/soc_foot/5.png" alt=""></a>
            </div>
        </div>
        <div class="form_foot">
            <h3><?= \Yii::t('app', 'Ваше мнение совет или критика')?></h3>
            <form>
                <input type="text" class="white_input foot_input" />
                <div class="foot_capcha">
                    <div class="capcha_line">
                                    <span class="capcha_img">
                                        <img src="/img/capcha.jpg" alt="">
                                    </span>
                        <input type="text" class="white_input" />
                    </div>
                </div>
                <input type="submit" class="white_btn" value="Отправить" />
            </form>
        </div>
        <div class="copyright_foot">
            <h3>2015 © Scanpard</h3>
            <nav class="nav_foot">
                <li><a href="#"><?= \Yii::t('app', 'О нас')?></a></li>
                <li><a href="#"><?= \Yii::t('app', 'Условия')?></a></li>
                <li><a href="#"><?= \Yii::t('app', 'Помощь')?></a></li>
            </nav>
        </div>
    </div>
</footer>
