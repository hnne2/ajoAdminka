<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LegalTexts $model */

$this->title = 'Create Legal Texts';
$this->params['breadcrumbs'][] = ['label' => 'Legal Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="legal-texts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
