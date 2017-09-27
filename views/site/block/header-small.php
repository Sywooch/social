<?php
use yii\helpers\Url;
?>
<header>
    <div class="full_width_container clearfix">
        <div class="login_head">
            <a href="<?= Url::to('enter')?>" class="login_head_link"><?= \Yii::t('app', 'Вход')?></a>
            <a href="<?= Url::to('enter')?>" class="login_head_link"><?= \Yii::t('app', 'Регистрация')?></a>
        </div>
        <div class="languages_head">
            <ul class="language-select">
                <li class="active" data-lang="ru">
                    <img src="img/flags/ru.svg"  class="lang_h_flag" alt="">
                    Русский
                </li>
                <li data-lang="gb">
                    <img src="img/flags/gb.svg"  class="lang_h_flag" alt="">
                    English
                </li>
                <li data-lang="de">
                    <img src="img/flags/de.svg"  class="lang_h_flag" alt="">
                    Deutsch
                </li>
            </ul>
        </div>
    </div>
</header>
