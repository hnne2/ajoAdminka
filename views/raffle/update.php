<?php
use yii\helpers\Html;

$this->title = 'Редактировать победителя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Список победителей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="raffle-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>