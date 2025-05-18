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
            ['class' => 'yii\grid\SerialColumn'],
            'telegram_nick',
            'date',
            'time',
            'prize',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>