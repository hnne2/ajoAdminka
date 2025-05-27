<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VapeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Список вейпов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vape-index">

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'filterUrl' => ['adminPanel/'], 
    'columns' => [
        [
            'attribute' => 'id',
            'filter' => false,
        ],
        [
            'attribute' => 'sort',
            'filter' => [
                'Классика' => 'Классика',
                'Десерты' => 'Десерты',
                'Напитки' => 'Напитки',
                'Фрукты' => 'Фрукты',
                'Миксы' => 'Миксы',
            ],
            'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Все сорта'],
        ],
        [
            'attribute' => 'is_top15',
            'label' => 'Топ-15',
            'value' => function($model) {
                return $model->is_top15 ? 'Да' : 'Нет';
            },
            'filter' => [
                '1' => 'Да',
                '0' => 'Нет',
            ],
            'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Все'],
        ],
        [
            'attribute' => 'isActive',
            'label' => 'Активен',
            'value' => function($model) {
                return $model->isActive ? 'Да' : 'Нет';
            },
            'filter' => [
                '1' => 'Да',
                '0' => 'Нет',
            ],
            'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Все'],
        ],
        [
            'attribute' => 'flavor_list',
            'filter' => false,
        ],
        [
            'attribute' => 'sweetness',
            'filter' => false,
        ],
        [
            'attribute' => 'ice_level',
            'filter' => false,
        ],
        [
            'attribute' => 'sourness',
            'filter' => false,
        ],
        [
            'attribute' => 'image_path',
            'format' => 'html',
            'value' => function($model) {
                return $model->image_path
                    ? Html::img('https://zland.demo.onlinebees.ru/apiZ/images/' . $model->image_path, ['style' => 'height: 50px;'])
                    : null;
            },
            'filter' => false,
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]); ?>




</div>
