<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнёры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name',
        'phone',
        'email',
        'telegram_nick',
        'message:ntext',
        [
            'attribute' => 'created_at',
            'value' => function($model) {
                return $model->created_at ? floor($model->created_at / 1000) : null;
            },
            'format' => ['date', 'php:d.m.Y H:i'],
        ],
        [
            'attribute' => 'updated_at',
            'value' => function($model) {
                return $model->updated_at ? floor($model->updated_at / 1000) : null;
            },
            'format' => ['date', 'php:d.m.Y H:i'],
        ],
    ],
]) ?>


</div>
