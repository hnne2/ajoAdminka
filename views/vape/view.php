<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vape */

$this->title = $model->sort;
$this->params['breadcrumbs'][] = ['label' => 'Вейпы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="vape-view">

    ```
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

 <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'sort',
        'flavor_list',
        'sweetness',
        'ice_level',
        'sourness',
        [
            'attribute' => 'image_path',
            'format' => 'html',
            'value' => $model->image_path ? Html::img('/' . $model->image_path, ['style' => 'height: 150px;']) : null,
        ],
        [
            'attribute' => 'is_top15',
            'value' => $model->is_top15 ? 'Да' : 'Нет',
            'label' => 'Топ-15',
        ],
    ],
]) ?>
    ```

</div>
