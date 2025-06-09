<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Check $model */

$this->title = 'Добавить чек';
$this->params['breadcrumbs'][] = ['label' => 'Checks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
