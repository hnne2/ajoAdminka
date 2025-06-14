<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Управление базой клиентов и номенклатурой товаров';
?>


<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success"><?= Yii::$app->session->getFlash('success') ?></div>
<?php elseif (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger"><?= Yii::$app->session->getFlash('error') ?></div>
<?php endif; ?>

<?php
$filePath = '/home/limkorm-check-bot/upload/AJO.xlsx';
if (file_exists($filePath)) {
    echo "<p><strong>Файл:</strong> AJO.xlsx</p>";
    echo Html::a('📥 Скачать файл', ['ajo/download'], ['class' => 'btn btn-success']);
} else {
    echo "<p><em>Файл AJO.xlex не найден.</em></p>";
}
?>

<hr>

<h3>Загрузить новую базу:</h3>
<?php $form = ActiveForm::begin([
    'action' => ['upload'],
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<?= Html::fileInput('ajoFile') ?>
<br><br>
<?= Html::submitButton('Загрузить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
