<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Управление файлом AJO.xlex';
?>

    <h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success"><?= Yii::$app->session->getFlash('success') ?></div>
<?php elseif (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger"><?= Yii::$app->session->getFlash('error') ?></div>
<?php endif; ?>

    <h3>Текущее содержимое файла AJO.xlex:</h3>
    <pre><?= Html::encode($fileContent ?: 'Файл не найден.') ?></pre>

    <h3>Загрузить новый файл:</h3>
<?php $form = ActiveForm::begin([
    'action' => ['upload'],
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<?= Html::fileInput('ajoFile') ?>
    <br><br>
<?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>