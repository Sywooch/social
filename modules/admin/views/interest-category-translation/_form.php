<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InterestCategoryTranslation */
/* @var $form yii\widgets\ActiveForm */

$categories = [];
foreach (\app\models\InterestCategory::find()->asArray()->all() as $record) {
    $categories[$record['id']] = $record['id'];
}
?>

<div class="interest-category-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sourceID')->dropDownList($categories); ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
