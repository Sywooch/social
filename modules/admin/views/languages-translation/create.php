<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LanguagesTranslation */

$this->title = 'Добавить перевод языка';
$this->params['breadcrumbs'][] = ['label' => 'Languages Translations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-translation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
