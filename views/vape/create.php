<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vape */

$this->title = 'Создать Вейп';
$this->params['breadcrumbs'][] = ['label' => 'Вейпы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vape-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
