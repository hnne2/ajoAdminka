<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vape */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss("
    .range-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    input[type=range] {
        -webkit-appearance: none;
        width: 200px;
        height: 4px;
        background: #ccc;
        border-radius: 2px;
        outline: none;
        padding: 0;
        margin: 0;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
        margin-top: -6px;
    }

    input[type=range]::-moz-range-thumb {
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
    }
");

$this->registerJs("
    const ranges = document.querySelectorAll('.range-wrapper input[type=range]');
    ranges.forEach(range => {
        const span = document.createElement('span');
        span.textContent = range.value;
        span.classList.add('range-value');
        range.parentNode.appendChild(span);
        range.addEventListener('input', () => {
            span.textContent = range.value;
        });
    });
");
?>

<div class="vape-form">

    <?php $form = ActiveForm::begin([
        'action' => $model->isNewRecord ? ['vape/create'] : ['vape/update', 'id' => $model->id],
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'sort')->dropDownList([
        'Классика' => 'Классика',
        'Десерты' => 'Десерты',
        'Напитки' => 'Напитки',
        'Фрукты' => 'Фрукты',
        'Миксы' => 'Миксы',
        'Травы' => 'Травы',
    ], ['prompt' => 'Выберите категорию']) ?>

    <?= $form->field($model, 'flavor_list')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sweetness', [
        'template' => "{label}\n<div class=\"range-wrapper\">{input}</div>\n{error}",
    ])->input('range', [
        'min' => 0,
        'max' => 2,
        'step' => 0.5,
    ]) ?>

    <?= $form->field($model, 'ice_level', [
        'template' => "{label}\n<div class=\"range-wrapper\">{input}</div>\n{error}",
    ])->input('range', [
        'min' => 0,
        'max' => 2,
        'step' => 0.5,
    ]) ?>

    <?= $form->field($model, 'sourness', [
        'template' => "{label}\n<div class=\"range-wrapper\">{input}</div>\n{error}",
    ])->input('range', [
        'min' => 0,
        'max' => 2,
        'step' => 0.5,
    ]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'is_top15')->checkbox(['label' => 'Отображать в топ-15']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>