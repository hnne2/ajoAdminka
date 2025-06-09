<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\PrizeInventory $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prize Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prize-inventory-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'probability',
            'total_quantity',
            'won_total',
            'won_today',
            'won_this_week',
            'daily_limit',
            'weekly_limit',
            'updated_at',
            'created_at',
            'label',
            'description',
            'image',
        ],
    ]) ?>

</div>
