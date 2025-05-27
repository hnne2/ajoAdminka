<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">


    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterUrl' => ['adminPanel/'],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'title',
        'description:ntext',
        'image',
        [
            'class' => ActionColumn::className(),
            'template' => '{update} {delete}', // убрали кнопку "view"
            'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            },
        ],
    ],
]); ?>


</div>
