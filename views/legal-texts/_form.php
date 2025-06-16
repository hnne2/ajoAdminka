<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/** @var yii\web\View $this */
/** @var app\models\LegalTexts $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="legal-texts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rules_content')->widget(TinyMce::class, [
        'options' => ['rows' => 10],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste code help wordcount"
            ],
            'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help"
        ]
    ]) ?>

    <?= $form->field($model, 'politika_content')->widget(TinyMce::class, [
        'options' => ['rows' => 10],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste code help wordcount"
            ],
            'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help"
        ]
    ]) ?>

    <?= $form->field($model, 'agreement_content')->widget(TinyMce::class, [
        'options' => ['rows' => 10],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste code help wordcount"
            ],
            'toolbar' => "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help"
        ]
    ]) ?>

    <?= $form->field($model, 'created_at')->textInput(['readonly' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
