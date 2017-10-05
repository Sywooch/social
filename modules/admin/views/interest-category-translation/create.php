<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InterestCategoryTranslation */

$this->title = Yii::t('app', 'Create Interest Category Translation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interest Category Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interest-category-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
