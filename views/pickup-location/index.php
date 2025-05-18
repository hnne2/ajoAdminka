<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Точки выдачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pickup-location-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'address',
            'latitude',
            'longitude',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
