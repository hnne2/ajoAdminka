<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

 namespace app\assets;

 use yii\web\AssetBundle;
 
 class AdminLteAsset extends AssetBundle
 {
     public $sourcePath = '@vendor/almasaeed2010/adminlte/dist'; // Путь к ресурсам AdminLTE
     public $css = [
         'css/adminlte.min.css', // Подключаем CSS
     ];
     public $js = [
         'js/adminlte.min.js', // Подключаем JS
     ];
     public $depends = [
         'yii\web\YiiAsset',
         'yii\bootstrap4\BootstrapAsset',
     ];
 }
