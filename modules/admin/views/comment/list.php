<?php
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h5>&nbsp;</h5>
        <ol class="breadcrumb">
            <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 'homeLink' => false]);?>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <?= \yii\grid\GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'id',
//                            'product.name',
                            [
                                'attribute' => 'productId',
                                'format' => 'raw',
                                'value' => function($model) {
                                    return $model->product->name;
                                }
                            ],
                            'userName',
                            'userEmail:email',
                            'rating',
                            'message:ntext',
                            [
                                'attribute' => 'date',
                                'filter' => \yii\jui\DatePicker::widget([
                                    'model' => $searchModel,
                                    'attribute'=>'date',
                                    'language' => 'ru',
                                    'dateFormat' => 'yyyy-MM-dd',
                                    'options' => ['class' => 'datepicker']
                                ]),
                            ],
                            [
                                'attribute' => 'isActive',
                                'filter' => array(1 => "Активен", 0 => "Не активен"),
                                'format' => 'raw',
                                'value' => function($model) {
                                    if ($model->isActive) {
                                        return '<a href="' . Url::to('/admin/'. Yii::$app->controller->id .'/active/' . $model->id) . '"><span class="badge badge-primary">Активен</span></a>';
                                    } else {
                                        return '<a href="' . Url::to('/admin/'. Yii::$app->controller->id .'/active/' . $model->id) . '"><span class="badge badge-danger">Не активен</span></a>';
                                    }
                                }
                            ],
                            [
                                'format' => 'raw',
                                'value' => function($model) {
                                    return '<div class="btn-group">
                                            <a href="' . Url::to('/admin/'. Yii::$app->controller->id .'/change/' . $model->id) . '" class="btn-white btn btn-xs">Редактировать</a>
                                            <a href="' . Url::to('/admin/'. Yii::$app->controller->id .'/remove/' . $model->id) . '" class="btn-white btn btn-xs">Удалить</a>
                                        </div>';
                                }
                            ],
                        ],
                    ]); ?>
            </div>
        </div>
    </div>
</div>
</div>
