<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PickupLocation */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- Подключение стилей и скриптов Leaflet -->
<?php
$this->registerCssFile("https://unpkg.com/leaflet@1.9.4/dist/leaflet.css");
$this->registerJsFile("https://unpkg.com/leaflet@1.9.4/dist/leaflet.js", ['depends' => [\yii\web\JqueryAsset::class]]);
?>

<div class="pickup-location-form">

    <?php $form = ActiveForm::begin([
       'action' => $model->isNewRecord 
           ? ['pickup-location/create'] 
           : ['pickup-location/update', 'id' => $model->id],
   ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 4, 'maxlength' => true]) ?>

    <!-- Скрытые поля для широты и долготы -->
    <?= $form->field($model, 'latitude')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'longitude')->hiddenInput()->label(false) ?>

    <!-- Контейнер для карты -->
    <div id="map" style="height: 400px; margin-bottom: 20px;"></div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(<<<JS
    // Инициализация карты
    var map = L.map('map').setView([55.751244, 37.618423], 10); // Москва по умолчанию

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var marker;

    function onMapClick(e) {
        var lat = e.latlng.lat.toFixed(6);
        var lng = e.latlng.lng.toFixed(6);

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }

        $('#pickuplocation-latitude').val(lat);
        $('#pickuplocation-longitude').val(lng);
    }

    map.on('click', onMapClick);

    // Если координаты уже есть — отобразить маркер и центрировать карту
    var initLat = $('#pickuplocation-latitude').val();
    var initLng = $('#pickuplocation-longitude').val();

    if (initLat && initLng) {
        var initLatLng = [parseFloat(initLat), parseFloat(initLng)];
        marker = L.marker(initLatLng).addTo(map);
        map.setView(initLatLng, 13);
    }
JS);
?>
