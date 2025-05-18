<?php
use yii\helpers\Html;

$this->title = 'Добавить победителя';
$this->params['breadcrumbs'][] = ['label' => 'Список победителей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raffle-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>