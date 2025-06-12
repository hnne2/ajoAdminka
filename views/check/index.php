<?php

use app\models\Check;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Чеки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $statuses = \app\models\Check::optsStatus();
                    $url = Url::to(['check/update-status']);
                    $options = '';
                    foreach ($statuses as $key => $label) {
                        $selected = $model->status == $key ? 'selected' : '';
                        $options .= "<option value='$key' $selected>$label</option>";
                    }
                    return "<select class='status-dropdown' data-id='{$model->id}' data-url='{$url}'>{$options}</select>";
                },
                'filter' => \app\models\Check::optsStatus(),
            ],
            'id',
            'inn',
            'title',
            ['attribute' => 'image_filename',
                'format' => 'raw',
                'value' => function ($model) {
                    if (!empty($model->image_filename)) {
                        $url = 'https://limkorm-check-bot.demo.onlinebees.ru/ajo/images/' . urlencode($model->image_filename);
                        return '<img class="clickable-image" src="' . $url . '" data-full="' . $url . '" style="height: 50px; cursor: pointer;" alt="img">';
                    }
                    return '<span style="color:#5566c9;">нет изображения</span>';
                },
                'filter' => false,
            ],
            'moderation_comment:text',
            'uploaded_at',
            [
                'attribute' => 'is_prize_sent',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->is_prize_sent ? 'Да' : 'Нет';
                },
                'filter' => [
                    '' => 'Все',
                    1 => 'Да',
                    0 => 'Нет',
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Check $model) {
                    return Url::to([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>

<!-- Модальное окно для изображения -->
<div id="simpleModal" style="
    display:none; position: fixed; z-index: 9999; left: 0; top: 0;
    width: 100%; height: 100%; background: rgba(0,0,0,0.8); text-align: center;
">
    <span id="modalClose" style="
        position: absolute; top: 20px; right: 30px;
        font-size: 30px; color: white; cursor: pointer; font-weight: bold;
    ">&times;</span>
    <img id="modalImg" src="" style="
        max-height: 90vh; max-width: 90vw; margin-top: 5vh; box-shadow: 0 0 15px #000;
    ">
</div>
<style>
    .status-dropdown {
        appearance: none; /* убираем дефолтный стрелочник */
        -webkit-appearance: none;
        -moz-appearance: none;

        background-color: #f0f4f8;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        padding: 5px 30px 5px 10px;
        font-size: 14px;
        color: #1e293b;
        cursor: pointer;
        width: 160px;
        background-image:
                url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D'10'%20height%3D'6'%20viewBox%3D'0%200%2010%206'%20xmlns%3D'http%3A//www.w3.org/2000/svg'%3E%3Cpath%20d%3D'M0%200l5%206%205-6z'%20fill%3D'%23666'%20/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 10px 6px;
    }

    .status-dropdown:hover {
        border-color: #94a3b8;
        background-color: #e2e8f0;
    }

    .status-dropdown:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.5);
        background-color: #f0f9ff;
    }
</style>


<?php
$script = <<<JS
// Показ изображения в модалке
document.querySelectorAll('.clickable-image').forEach(img => {
    img.addEventListener('click', function(e) {
        e.preventDefault();
        const src = this.getAttribute('data-full');
        if (src && src !== 'null' && src.trim() !== '') {
            document.getElementById('modalImg').src = src;
            document.getElementById('simpleModal').style.display = 'block';
        }
    });
});
document.getElementById('modalClose').addEventListener('click', () => {
    document.getElementById('simpleModal').style.display = 'none';
});
document.getElementById('simpleModal').addEventListener('click', function(e) {
    if (e.target === this) {
        this.style.display = 'none';
    }
});

// AJAX смена статуса
document.querySelectorAll('.status-dropdown').forEach(dropdown => {
    dropdown.addEventListener('change', function () {
        const newStatus = this.value;
        const id = this.getAttribute('data-id');
        const url = this.getAttribute('data-url');

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-Token': yii.getCsrfToken()
            },
            body: 'id=' + encodeURIComponent(id) + '&status=' + encodeURIComponent(newStatus)
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Ошибка: ' + (data.error || 'Не удалось обновить статус'));
            }
        })
        .catch(() => {
            alert('Ошибка сети при обновлении статуса');
        });
    });
});

JS;
$this->registerJs($script);
?>
