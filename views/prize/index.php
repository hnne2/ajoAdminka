<?php

use app\models\Prize;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Призы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'check_id',
            'prize_type',
            'status',
            //'sent_at',
            //'notes:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Prize $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
