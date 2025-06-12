<?php

namespace app\controllers;

use Yii;
use app\models\Mail;
use yii\web\Controller;

class MailController extends Controller
{
    public function actionUpdate()
    {
        $model = Mail::findOne(1); // Т.к. id=1 по умолчанию

        if ($model === null) {
            throw new \yii\web\NotFoundHttpException("Запись не найдена");
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Почта обновлена.');
            return $this->refresh();
        }

        return $this->render('update', ['model' => $model]);
    }
}
