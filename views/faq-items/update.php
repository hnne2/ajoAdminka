<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FaqItems $model */

$this->title = 'Update Faq Items: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Faq Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="faq-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
