<?php
use yii\helpers\Url;
?>
<header>
    <div class="full_width_container clearfix">
        <?php if (empty($this->params['user'])):?>
        <div class="login_head">
            <a href="<?= Url::to('/site/enter')?>" class="login_head_link"><?= \Yii::t('app', 'Вход')?></a>
            <a href="<?= Url::to('/site/enter')?>" class="login_head_link"><?= \Yii::t('app', 'Регистрация')?></a>
        </div>
        <?php else:?>
            Привет, <a href="<?= Url::to('/profile')?>">
                <?= !empty($this->params['user']->fullName) ? $this->params['user']->fullName : $this->params['user']->email?>
            </a>
            <a href="<?= Url::to('/site/logout')?>"><?= \Yii::t('app', 'Выйти')?></a>
        <?php endif;?>
        <div class="languages_head">
            <ul class="language-select">
                <li class="active" data-lang="ru">
                    <img src="/img/flags/ru.svg"  class="lang_h_flag" alt="">
                    Русский
                </li>
                <li data-lang="gb">
                    <img src="/img/flags/gb.svg"  class="lang_h_flag" alt="">
                    English
                </li>
                <li data-lang="de">
                    <img src="/img/flags/de.svg"  class="lang_h_flag" alt="">
                    Deutsch
                </li>
            </ul>
        </div>
    </div>
</header>
