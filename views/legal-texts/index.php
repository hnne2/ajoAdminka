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

    <p>
        <?= Html::a('Create Legal Texts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'email',
            'rules_content:ntext',
            'politika_content:ntext',
            'agreement_content:ntext',
            'created_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LegalTexts $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
