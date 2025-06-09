<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PrizeInventory $model */

$this->title = 'Create Prize Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Prize Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-inventory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
