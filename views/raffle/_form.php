<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'action' => $model->isNewRecord ? ['raffle/create'] : ['raffle/update', 'id' => $model->id],
]); ?>

 
    <?= $form->field($model, 'telegram_nick')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date')->input('date') ?>
    <?= $form->field($model, 'time')->input('time') ?>
    <?= $form->field($model, 'prize')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>  