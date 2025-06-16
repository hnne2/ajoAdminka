<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\FaqItems $model */

$this->title = 'Create Faq Items';
$this->params['breadcrumbs'][] = ['label' => 'Faq Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
