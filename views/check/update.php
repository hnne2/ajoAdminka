<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Check $model */

$this->title = 'Update Check: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="check-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
