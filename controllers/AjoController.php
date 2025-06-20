<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;

class AjoController extends Controller
{
    public function actionIndex()
    {
        $filePath = '/home/limkorm-check-bot/upload/AJO.xlsx';
        $fileContent = file_exists($filePath) ? file_get_contents($filePath) : null;

        return $this->render('index', [
            'fileContent' => $fileContent,
        ]);
    }

    public function actionUpload()
    {
        $uploadPath = '/home/limkorm-check-bot/upload/';
        $targetFileName = 'AJO.xlsx';

        $uploadedFile = UploadedFile::getInstanceByName('ajoFile');
        if ($uploadedFile) {
            $fullPath = $uploadPath . $targetFileName;
            if ($uploadedFile->saveAs($fullPath)) {
                Yii::$app->session->setFlash('success', 'Файл успешно загружен и сохранён как AJO.xlsx.');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка при сохранении файла.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'Файл не был загружен.');
        }

        return $this->redirect(['index']);
    }

    public function actionDownload()
    {
        $filePath = '/home/limkorm-check-bot/upload/AJO.xlsx';
        if (file_exists($filePath)) {
            return Yii::$app->response->sendFile($filePath, 'AJO.xlsx');
        }

        Yii::$app->session->setFlash('error', 'Файл не найден.');
        return $this->redirect(['index']);
    }
}
