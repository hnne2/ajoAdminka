<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vape */

$this->title = 'Редактировать Вейп: ' . $model->sort;
$this->params['breadcrumbs'][] = ['label' => 'Вейпы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sort, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="vape-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
