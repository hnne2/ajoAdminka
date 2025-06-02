<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ScratchCard $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="scratch-card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'check_id')->textInput() ?>

    <?= $form->field($model, 'attempt_number')->textInput() ?>

    <?= $form->field($model, 'result')->dropDownList([ 'win' => 'Win', 'lose' => 'Lose', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'prize_type')->dropDownList([ 'tshirt' => 'Tshirt', 'ozon_card' => 'Ozon card', 'vk_fest_ticket' => 'Vk fest ticket', ], ['prompt' => '']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
