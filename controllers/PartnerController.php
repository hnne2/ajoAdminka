<?php

namespace app\controllers;

use Yii;
use app\models\Partner;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PartnerController implements the CRUD actions for Partner model.
 */
class PartnerController extends Controller
{
    public function actionIndex()
{
    $dataProvider = new ActiveDataProvider([
        'query' => Partner::find(),
        'sort' => [
            'defaultOrder' => [
                'created_at' => SORT_DESC,  // сортировка по created_at по убыванию (новые сверху)
            ],
        ],
    ]);

    return $this->render('index', [
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
        $model = new Partner();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = (int)(microtime(true) * 1000);
            $model->updated_at = (int)(microtime(true) * 1000);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = (int)(microtime(true) * 1000);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Partner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Страница не найдена.');
    }
}
