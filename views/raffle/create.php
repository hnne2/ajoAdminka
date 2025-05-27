<?php
use yii\helpers\Html;

$this->title = 'Добавить победителя';
$this->params['breadcrumbs'][] = ['label' => 'Список победителей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raffle-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>