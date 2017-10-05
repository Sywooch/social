<?php
    use yii\helpers\Url;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav metismenu" id="side-menu">
<li class="nav-header">
    <div class="profile-element"> <span>
                            <img alt="image" class="img-circle" src="/img/logo.png" style="width: 150px;"/>
                             </span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold"><?= \Yii::$app->user->getIdentity()->email ?></strong>
                             </span> <span class="text-muted text-xs block"> ... </span> </span> </a>
    </div>
    <div class="logo-element">
        IN+
    </div>
</li>
    <?php if (in_array('user', \Yii::$app->user->getIdentity()->group->availableActions)):?>
<li <?php echo (Yii::$app->controller->id == 'user' || Yii::$app->controller->id == 'group') ? 'class="active"' : '';?>>
    <a href="javascript:void(0)"><i class="fa fa-male"></i> <span class="nav-label">Пользователи</span> <span
            class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li <?php echo (Yii::$app->controller->id == 'user') ? 'class="active"' : '';?>>
            <a href="<?= Url::to('/admin/user/list')?>">Список пользователей</a>
        </li>
        <li <?php echo (Yii::$app->controller->id == 'group') ? 'class="active"' : '';?>>
            <a href="<?= Url::to('/admin/group/list')?>">Группы пользователей</a>
        </li>
    </ul>
</li>
<?php endif;?>
<?php if (in_array('languages', \Yii::$app->user->getIdentity()->group->availableActions)):?>
        <li <?php echo (Yii::$app->controller->id == 'languages' || Yii::$app->controller->id == 'languages-translation') ? 'class="active"' : '';?>>
            <a href="javascript:void(0)"><span class="nav-label">Языки</span> <span
                    class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li <?php echo (Yii::$app->controller->id == 'languages') ? 'class="active"' : '';?>>
                    <a href="<?= Url::to('/admin/languages')?>">Список языков</a>
                </li>
                <li <?php echo (Yii::$app->controller->id == 'languages-translation') ? 'class="active"' : '';?>>
                    <a href="<?= Url::to('/admin/languages-translation')?>">Переводы языков</a>
                </li>
            </ul>
        </li>
<?php endif;?>
    <li <?php echo (Yii::$app->controller->id == 'interest' || Yii::$app->controller->id == 'interest-translation') ? 'class="active"' : '';?>>
        <a href="javascript:void(0)"><span class="nav-label">Интересы</span> <span
                class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li <?php echo (Yii::$app->controller->id == 'interest') ? 'class="active"' : '';?>>
                <a href="<?= Url::to('/admin/interest')?>">Список интересов</a>
            </li>
            <li <?php echo (Yii::$app->controller->id == 'interest-translation') ? 'class="active"' : '';?>>
                <a href="<?= Url::to('/admin/interest-translation')?>">Переводы интересов</a>
            </li>
        </ul>
    </li>
    <li <?php echo (Yii::$app->controller->id == 'interest-category' || Yii::$app->controller->id == 'interest-category-translation') ? 'class="active"' : '';?>>
        <a href="javascript:void(0)"><span class="nav-label">Категории Интересов</span> <span
                class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li <?php echo (Yii::$app->controller->id == 'interest-category') ? 'class="active"' : '';?>>
                <a href="<?= Url::to('/admin/interest-category')?>">Список Категории</a>
            </li>
            <li <?php echo (Yii::$app->controller->id == 'interest-category-translation') ? 'class="active"' : '';?>>
                <a href="<?= Url::to('/admin/interest-category-translation')?>">Переводы Категории</a>
            </li>
        </ul>
    </li>
<?php if (in_array('info-page', \Yii::$app->user->getIdentity()->group->availableActions)):?>
<li <?php echo (Yii::$app->controller->id == 'info-page') ? 'class="active"' : '';?>>
    <a href="<?= Url::to('/admin/info-page/list')?>"><i class="fa fa-eye"></i> <span class="nav-label">Страници</span> </a>
</li>
<?php endif;?>
</ul>

</div>
</nav>
