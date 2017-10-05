<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterestCategoryTranslation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Interest Category Translation',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interest Category Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="interest-category-translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
