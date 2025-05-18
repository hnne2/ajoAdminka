<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vape".
 *
 * @property int $id
 * @property string $sort
 * @property string $flavor_list
 * @property float $sweetness
 * @property float $ice_level
 * @property float $sourness
 * @property string|null $image_path
 * @property int $is_top15
 */
class Vape extends \yii\db\ActiveRecord
{
    /**
     * @var \yii\web\UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vape';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'flavor_list', 'sweetness', 'ice_level', 'sourness'], 'required'],
            [['sweetness', 'ice_level', 'sourness'], 'number'],
            [['sort', 'flavor_list', 'image_path'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['is_top15'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort' => 'Сорт',
            'flavor_list' => 'Вкусы',
            'sweetness' => 'Сладость',
            'ice_level' => 'Холод',
            'sourness' => 'Кислинка',
            'image_path' => 'Изображение',
            'is_top15' => 'Топ 15',
        ];
    }

    /**
     * Загрузка файла изображения и сохранение пути
     *
     * @return bool
     */
public function upload()
{
    if ($this->validate()) {
        $uploadDir = '/home/zland/java/uploads/'; // абсолютный путь

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = uniqid() . '.' . $this->imageFile->extension;
        $fullPath = $uploadDir . $fileName;

        if ($this->imageFile->saveAs($fullPath)) {
            $this->image_path = $fileName; // сохраняем только имя файла в БД
            return true;
        }
    }

    return false;
}
}
