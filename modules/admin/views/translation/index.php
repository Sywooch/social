<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\SearchI18nTranslation */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'I18n Translations');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .message-editor-field {
        display: none;
    }
</style>
<script type="text/javascript">

</script>
<div class="i18n-translation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create I18n Translation'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'sourceId',
            'language',
            [
                'attribute' => 'message',
                'format' => 'raw',
                'value' => function($model) {
                    return '
                    <span class="message message-label" id="message-'.$model->id.'">' .$model->message. '</span>
                    <div class="message-editor-field">
                        <input class="message" data-id="' . $model->id . '" value="' .$model->message. '" style="width: 100%;"/>
                        <button class="submit-message">Сохранить</button>
                    </div>
                    ';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
