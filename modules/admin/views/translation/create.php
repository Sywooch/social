<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\I18nTranslation */

$this->title = Yii::t('app', 'Create I18n Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'I18n Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
