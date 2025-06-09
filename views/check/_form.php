<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Check $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="check-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>


    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'scanned_success' => 'Scanned success', 'manual_review' => 'Manual review', 'rejected' => 'Rejected', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'moderation_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_prize_sent')->dropDownList([
        0 => 'Нет',
        1 => 'Да',
    ]) ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
