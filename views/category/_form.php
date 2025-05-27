<?php use yii\helpers\Html; ?>
<?php use yii\widgets\ActiveForm; ?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'action' => $model->isNewRecord ? ['category/create'] : ['category/update', 'id' => $model->id],
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
