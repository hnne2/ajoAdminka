<?php

use app\models\ScratchCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Попытки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scratch-card-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'check_id',
            'attempt_number',
            'result',
            //'prize_type',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ScratchCard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
