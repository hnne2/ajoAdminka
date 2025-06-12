<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Check $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="check-form">

    <?php $form = ActiveForm::begin([
        'action' => $model->isNewRecord ? ['check/create'] : ['check/update', 'id' => $model->id],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>


    <?= $form->field($model, 'inn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList([ 'scanned_success' => 'Успешное сканирование', 'manual_review' => 'Ручная проверка', 'rejected' => 'отклонен', ], ['prompt' => '']) ?>


    <?= $form->field($model, 'moderation_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
