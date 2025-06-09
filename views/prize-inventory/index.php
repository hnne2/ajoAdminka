<?php

use app\models\PrizeInventory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PrizeInventorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Призы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-inventory-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'type',
            'probability',
            'label',
            'description',
            'total_quantity',
            'won_total',
            'won_today',
            'won_this_week',
            'daily_limit',
            'weekly_limit',
            //'updated_at',
            //'created_at',
            ['attribute' => 'image',
                'format' => 'raw',
                'value' => function ($model) {
                    if (!empty($model->image)) {
                        $url = 'http://localhost:8081/ajoApi/images/' . urlencode($model->image);
                        return '<img class="clickable-image" src="' . $url . '" data-full="' . $url . '" style="height: 50px; cursor: pointer;" alt="img">';
                    }
                    return '<span style="color:#5566c9;">нет изображения</span>';
                },
                'filter' => false,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, PrizeInventory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
