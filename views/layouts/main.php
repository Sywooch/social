<?php
/**
 * Главный лейоут.
 *
 * @var $this \yii\web\View
 * @var $content string
 *
 * @version 1.0
 */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= \Yii::$app->params['seo']['title']?></title>
    <meta name="keywords" content="<?= \Yii::$app->params['seo']['keywords']?>">
    <meta name="description" content="<?= \Yii::$app->params['seo']['description']?>">
    <link rel="icon" type="image/png" href="/img/icon/16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/img/icon/32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/img/icon/96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/img/icon/144x144.png" sizes="144x144">
    <link rel="icon" type="image/jpeg" href="/img/icon/152x152.jpg" sizes="152x152">
    <?php $this->head() ?>
</head>

<body>
<div class="wrapper">

    <?php if(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index') {
        echo $this->render('//site/block/header');
    } else {
        echo $this->render('//site/block/header-small');
    }
    ?>

    <?= $content ?>

    <?= $this->render('//site/block/footer'); ?>
</div>

<?= $this->render('//site/block/modals'); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
