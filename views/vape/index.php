<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список вейпов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vape-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'sort',
            'flavor_list',
            'sweetness',
            'ice_level',
            'sourness',
            [
                'attribute' => 'is_top15',
                'label' => 'Топ-15',
                'value' => function($model) {
                    return $model->is_top15 ? 'Да' : 'Нет';
                },
            ],
            [
                'attribute' => 'image_path',
                'format' => 'html',
                'value' => function($model) {
                    return $model->image_path
                        ? Html::img('https://zland.demo.onlinebees.ru/apiZ/images/' . $model->image_path, ['style' => 'height: 50px;'])
                        : null;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>

</div>
