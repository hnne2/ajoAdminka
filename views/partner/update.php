<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = 'Редактировать Партнёра: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнёры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="partner-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
