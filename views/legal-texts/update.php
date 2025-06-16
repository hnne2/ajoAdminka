<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LegalTexts $model */

$this->title = 'Update Legal Texts: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Legal Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="legal-texts-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
