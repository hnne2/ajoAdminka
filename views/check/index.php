<?php

use app\models\Feedback;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FeedbackSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Список победителей';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="feedback-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'name',
                'tel',
                'email:email',
                'prize',
                'created_at',
                [
                    'attribute' => 'is_processed',
                    'label' => 'Обработано',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::checkbox('is_processed', $model->is_processed, [
                            'class' => 'is-processed-checkbox',
                            'data-id' => $model->id,
                        ]);
                    },
                ],
                [
                    'class' => ActionColumn::class,
                    'template' => '{update} {delete}',
                    'urlCreator' => function ($action, Feedback $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>

<?php
$updateUrl = Url::to(['feedback/update-processed']);
$js = <<<JS
$('.feedback-index').on('change', '.is-processed-checkbox', function() {
    var checkbox = $(this);
    var id = checkbox.data('id');
    var isProcessed = checkbox.is(':checked') ? 1 : 0;

    $.ajax({
        url: '$updateUrl',
        type: 'POST',
        data: {
            id: id,
            is_processed: isProcessed,
            _csrf: yii.getCsrfToken()
        },
        success: function(response) {
            if (!response.success) {
                alert('Ошибка: ' + response.message);
                checkbox.prop('checked', !isProcessed); // вернуть чекбокс в прежнее состояние
            }
        },
        error: function() {
            alert('Ошибка при сохранении статуса');
            checkbox.prop('checked', !isProcessed); // вернуть чекбокс в прежнее состояние
        }
    });
});
JS;

$this->registerJs($js);
