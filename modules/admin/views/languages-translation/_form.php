<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LanguagesTranslation */
/* @var $form yii\widgets\ActiveForm */

$languages = [];
foreach (\app\models\Languages::find()->asArray()->all() as $record) {
    $languages[$record['id']] = $record['code'];
}
?>

<div class="languages-translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sourceID')->dropDownList($languages); ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
