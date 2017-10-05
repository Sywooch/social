<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Interest */
/* @var $form yii\widgets\ActiveForm */

$categories = [];
foreach (\app\models\InterestCategory::find()->select('interest_category.id, interest_category_translation.name')->joinWith('translation')->asArray()->all() as $record) {
    $categories[$record['id']] = $record['name'];
}
?>

<div class="interest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categoryID')->dropDownList($categories); ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
