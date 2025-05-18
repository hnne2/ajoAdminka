<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
?>

<div class="raffle-sitting-form">
    <?php $form = ActiveForm::begin([
        'id' => 'raffle-sitting-form',
        'action' => $model->isNewRecord ? ['raffle/settings'] : ['raffle/settings', 'id' => $model->id],
        'options' => ['enctype' => 'multipart/form-data'], // For file uploads
    ]); ?>

    <?= $form->errorSummary($model); ?> <!-- Moved after ActiveForm::begin() -->

    <?= $form->field($model, 'probability')->input('number', ['step' => 0.01, 'min' => 0, 'max' => 1]) ?>

    <?= $form->field($model, 'prize')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'standard',
            'inline' => false,
            'height' => 150,
        ],
    ]) ?>

    <?= $form->field($model, 'prize_image')->fileInput() ?>

   <?php if ($model->prize_image_path): ?>
    <div style="margin-top:10px;">
        <p>Текущее изображение:</p>
        <?= Html::img('https://zland.demo.onlinebees.ru/apiZ/images/' . $model->prize_image_path, ['style' => 'max-width:300px;']) ?>
    </div>
<?php endif; ?>

    <?= $form->field($model, 'pickup_location')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'max_prizes')->input('number', ['min' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>