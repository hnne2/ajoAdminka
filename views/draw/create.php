<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Draw $model */

$this->title = 'Добавить розыгрыш';
$this->params['breadcrumbs'][] = ['label' => 'Draws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="draw-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
