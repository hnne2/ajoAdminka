<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var $model \app\models\Mail */

$this->title = 'Редактировать почту для отправки оповещений';
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">Почта успешно обновлена.</div>
<?php endif; ?>

<?php $form = ActiveForm::begin([
        'action' => $model->isNewRecord ? ['mail/update'] : ['mail/update', 'id' => $model->id],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

<?= $form->field($model, 'mail_address')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
