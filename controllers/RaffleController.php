<?php
namespace app\controllers;

use Yii;
use app\models\Winner;
use app\models\RaffleSettings;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class RaffleController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    // Список победителей
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Winner::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // Создание победителя
    public function actionCreate()
    {
        $model = new Winner();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // Обновление победителя
    public function actionUpdate($id)
    {
        $model = $this->findWinnerModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    // Удаление победителя
    public function actionDelete($id)
    {
        $this->findWinnerModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionSettings()
{
    $model = RaffleSettings::findOne(1) ?? new RaffleSettings();

    if ($model->load(Yii::$app->request->post())) {
        $model->prize_image = UploadedFile::getInstance($model, 'prize_image');
        if ($model->prize_image && !$model->upload()) {
            Yii::$app->session->setFlash('error', 'Ошибка загрузки изображения.');
        }

        if ($model->save(false)) {
            Yii::$app->session->setFlash('success', 'Настройки сохранены.');
            return $this->redirect(['settings']);
        }
    }

    return $this->render('settings', [
        'model' => $model,
    ]);
}
protected function findWinnerModel($id)
{
    if (($model = Winner::findOne($id)) !== null) {
        return $model;
    }

    throw new NotFoundHttpException('Победитель не найден.');
}
}