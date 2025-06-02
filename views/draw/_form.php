<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Draw $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="draw-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'prize_type')->dropDownList([ 'tshirt' => 'Tshirt', 'ozon_card' => 'Ozon card', 'vk_fest_ticket' => 'Vk fest ticket', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'remaining_quantity')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
