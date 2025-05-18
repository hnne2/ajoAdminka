<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнёры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'phone',
            'email',
            'telegram_nick',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
