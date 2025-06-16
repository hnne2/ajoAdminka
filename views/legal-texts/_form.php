<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LegalTexts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="legal-texts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rules_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'politika_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'agreement_content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
