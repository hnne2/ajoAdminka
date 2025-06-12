<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PrizeInventory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prize-inventory-form">

    <?php $form = ActiveForm::begin([
        'action' => $model->isNewRecord ? ['prize-inventory/create'] : ['prize-inventory/update', 'id' => $model->id],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'probability')->textInput() ?>


    <?= $form->field($model, 'total_quantity')->textInput() ?>

    <?= $form->field($model, 'won_total')->textInput() ?>

    <?= $form->field($model, 'won_today')->textInput() ?>

    <?= $form->field($model, 'won_this_week')->textInput() ?>

    <?= $form->field($model, 'daily_limit')->textInput() ?>

    <?= $form->field($model, 'weekly_limit')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
