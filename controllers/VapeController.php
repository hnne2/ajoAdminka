<?php

namespace app\controllers;

use Yii;
use app\models\Vape;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\models\Category;

/**
 * VapeController implements the CRUD actions for Vape model.
 */
class VapeController extends Controller
{
    public function actionIndex()
    {
        if (empty(Yii::$app->request->queryParams)) {
            return $this->redirect(['index', 'VapeSearch' => [
                'isActive' => '',
                'is_top15' => '',
                'sort' => '',
            ]]);
        }
        $searchModel = new \app\models\VapeSearch(); // подключаем модель поиска
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); // фильтрация
    
        return $this->render('index', [
            'searchModel' => $searchModel, // передаём в представление
            'dataProvider' => $dataProvider,
        ]);
    }
    

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
public function actionCreate()
{
    $model = new Vape();

  $titles = Category::find()->select('title')->column();
    $categories = !empty($titles) ? array_combine($titles, $titles) : [];
    if ($model->load(Yii::$app->request->post())) {
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->imageFile && $model->upload()) {
            // файл успешно загружен
        }
        if ($model->save(false)) {
            return $this->redirect(['index']);
        }
    }

    return $this->render('create', [
        'model' => $model,
        'categories' => $categories,
    ]);
}

public function actionUpdate($id)
{
    $model = $this->findModel($id);

 $titles = Category::find()->select('title')->column();
    $categories = !empty($titles) ? array_combine($titles, $titles) : [];
    if ($model->load(Yii::$app->request->post())) {
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->imageFile && $model->upload()) {
            // файл успешно загружен
        }
        if ($model->save(false)) {
            return $this->redirect(['index']);
        }
    }

    return $this->render('update', [
        'model' => $model,
        'categories' => $categories,
    ]);
}

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Vape::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Страница не найдена.');
    }
}
