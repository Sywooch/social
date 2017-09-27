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
    <?php $this->head() ?>
</head>

<body>
<div class="wrapper">

    <?php if(Yii::$app->controller->action->id == 'index') {
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
