<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PrizeInventorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prize-inventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'total_quantity') ?>

    <?= $form->field($model, 'won_total') ?>

    <?= $form->field($model, 'won_today') ?>

    <?php // echo $form->field($model, 'won_this_week') ?>

    <?php // echo $form->field($model, 'daily_limit') ?>

    <?php // echo $form->field($model, 'weekly_limit') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'label') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
