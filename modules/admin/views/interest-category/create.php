<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InterestCategory */

$this->title = Yii::t('app', 'Create Interest Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interest Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interest-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
