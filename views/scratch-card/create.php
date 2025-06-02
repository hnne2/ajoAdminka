<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ScratchCard $model */

$this->title = 'Создать карточку попытки';
$this->params['breadcrumbs'][] = ['label' => 'Scratch Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scratch-card-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
