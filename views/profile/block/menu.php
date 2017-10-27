<?php
    use yii\helpers\Url;
?>
<aside>
    <div class="aside_nav">
        <li class="<?= (\Yii::$app->controller->action->id == 'index') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile')?>" class="aside_nav_1"><?= \Yii::t('app', 'Моя страница');?></a>
        </li>
        <li class="<?= (\Yii::$app->controller->action->id == 'messages') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile/messages')?>" class="aside_nav_2"><?= \Yii::t('app', 'Мои сообщения');?></a>
        </li>
        <li class="<?= (\Yii::$app->controller->action->id == 'ads') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile/ads-list')?>" class="aside_nav_3"><?= \Yii::t('app', 'Мои объявления');?></a>
        </li>
        <li class="<?= (\Yii::$app->controller->action->id == 'friends') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile/friends')?>" class="aside_nav_4"><?= \Yii::t('app', 'Мои друзья');?></a>
        </li>
        <li class="<?= (\Yii::$app->controller->action->id == 'companies') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile/companies')?>" class="aside_nav_5"><?= \Yii::t('app', 'Мои компании');?></a>
        </li>
        <li class="<?= (\Yii::$app->controller->action->id == 'photos') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile/photos')?>" class="aside_nav_6"><?= \Yii::t('app', 'Мои фотографии');?></a>
        </li>
<!--        <li>-->
<!--            <a href="#" class="aside_nav_7">--><?//= \Yii::t('app', 'Мои видеозаписи');?><!--</a>-->
<!--        </li>-->
        <li class="<?= (\Yii::$app->controller->action->id == 'settings') ? 'aside_nav_active' :''?>">
            <a href="<?= Url::to('/profile/settings')?>" class="aside_nav_8"><?= \Yii::t('app', 'Мои настройки');?></a>
        </li>
    </div>
</aside>
