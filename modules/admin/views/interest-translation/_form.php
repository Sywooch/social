<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InterestTranslation */
/* @var $form yii\widgets\ActiveForm */

$interests = [];
foreach (\app\models\Interest::find()->asArray()->all() as $record) {
    $interests[$record['id']] = $record['id'];
}
?>

<div class="interest-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sourceID')->dropDownList($interests);?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
