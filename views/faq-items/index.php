<?php

use app\models\FaqItems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faq Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-items-index">


    <p>
        <?= Html::a('Create Faq Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'label',
            'content:ntext',
            //'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FaqItems $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
