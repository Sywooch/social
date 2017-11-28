<?php
use yii\helpers\Url;
?>
<header class="logged_header">
    <div class="full_width_container clearfix">
        <?php if (empty($this->params['user'])):?>
        <div class="login_head">
            <a href="<?= Url::to('/site/enter')?>" class="login_head_link"><?= \Yii::t('app', 'Вход')?></a>
            <a href="<?= Url::to('/site/enter')?>" class="login_head_link"><?= \Yii::t('app', 'Регистрация')?></a>
        </div>
        <?php else:?>
            <div class="login_head">
                <a href="<?= Url::to('/profile')?>" class="login_profile">
                    <?= !empty($this->params['user']->fullName) ? $this->params['user']->fullName : $this->params['user']->email?>
                </a>
                <a href="<?= Url::to('/site/logout')?>" class="log_out_btn"></a>
            </div>
        <?php endif;?>
        <div class="languages_head">
            <ul class="language-select">
                <?php foreach (\app\components\Registry::get('languages') as $language):?>
                    <li class="<?= ($language['code'] == \Yii::$app->language) ? 'active' : '' ?>" data-lang="<?= $language['code']?>">
                        <img src="/img/flags/<?= $language['code']?>.svg"  class="lang_h_flag" alt="">
                        <a href="<?php echo Url::to([Yii::$app->request->url, 'language' => $language['code']]);?>">
                            <?= $language['name']?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</header>
