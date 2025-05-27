<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $image
 */
use yii\web\UploadedFile;

class Category extends \yii\db\ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['description', 'image'], 'default', 'value' => null],
            [['title'], 'required'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg, webp', 'skipOnEmpty' => true],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'image' => 'Картинка',
            'imageFile' => 'Файл картинки', // Добавляем
        ];
    }

  
    public function upload()
    {
        if ($this->imageFile) {
            $uploadPath = '/home/zland/java/uploads/';
            $fileName = uniqid() . '.' . $this->imageFile->extension;
            $fullPath = $uploadPath . $fileName;

            if ($this->imageFile->saveAs($fullPath)) {
                $this->image = $fileName; // Сохраняем имя файла в БД
                return true;
            }
        }
        return false;
    }
}
