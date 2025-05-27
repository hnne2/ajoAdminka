<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Список победителей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raffle-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
            ],
            'telegram_nick',
            'date',
            'time',
            [
                'attribute' => 'prize',
                'label' => 'Приз',
                'value' => function ($model) {
                    return strip_tags($model->prize);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>