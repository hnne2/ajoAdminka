<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PrizeInventory $model */

$this->title = 'Обновить приз: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prize Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prize-inventory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
