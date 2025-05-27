<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = 'Добавить Партнёра';
$this->params['breadcrumbs'][] = ['label' => 'Партнёры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
