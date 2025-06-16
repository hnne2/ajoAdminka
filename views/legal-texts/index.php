<?php

use app\models\LegalTexts;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Legal Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="legal-texts-index">



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'email',
            [
                'attribute' => 'rules_content',
                'format' => 'html',
                'value' => function($model) {
                    return \yii\helpers\StringHelper::truncateWords(strip_tags($model->rules_content), 20);
                }
            ],
            [
                'attribute' => 'politika_content',
                'format' => 'html',
                'value' => function($model) {
                    return \yii\helpers\StringHelper::truncateWords(strip_tags($model->politika_content), 20);
                }
            ],
            [
                'attribute' => 'agreement_content',
                'format' => 'html',
                'value' => function($model) {
                    return \yii\helpers\StringHelper::truncateWords(strip_tags($model->agreement_content), 20);
                }
            ],
            'created_at',
            [
                'class' => ActionColumn::class,
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, LegalTexts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>



</div>
