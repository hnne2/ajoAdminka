<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Prize $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prize-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'check_id')->textInput() ?>

    <?= $form->field($model, 'prize_type')->dropDownList([ 'tshirt' => 'Tshirt', 'ozon_card' => 'Ozon card', 'vk_fest_ticket' => 'Vk fest ticket', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'pending' => 'Pending', 'sent' => 'Sent', ], ['prompt' => '']) ?>


    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
