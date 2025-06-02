<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prize $model */

$this->title = 'Создать приз';
$this->params['breadcrumbs'][] = ['label' => 'Prizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prize-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
