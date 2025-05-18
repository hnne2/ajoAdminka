<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

class RaffleSettings extends ActiveRecord
{
    /**
     * @var UploadedFile|null Загружаемое изображение приза
     */
    public $prize_image;

    public static function tableName()
    {
        return 'raffle_settings';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function rules()
    {
        return [
            [['probability', 'prize', 'pickup_location', 'max_prizes'], 'required'],
            [['probability'], 'number', 'min' => 0, 'max' => 1],
            [['max_prizes'], 'integer', 'min' => 1],
            [['prize', 'pickup_location'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'integer'],
            // правило для загружаемого файла
            [['prize_image'], 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 5, 'skipOnEmpty' => true], // до 5 МБ
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'probability' => 'Вероятность выпадения 3 одинаковых элементов',
            'prize' => 'Выигрыш',
            'pickup_location' => 'Место получения',
            'max_prizes' => 'Максимальное количество призов',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'prize_image' => 'Изображение приза',
        ];
    }
public function upload()
    {
        if (!$this->prize_image) {
            return false;
        }

        $dir = '/home/zland/java/uploads';
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $filename = uniqid('prize_', true) . '.' . $this->prize_image->extension;
        $path = $dir . '/' . $filename;

        if ($this->prize_image->saveAs($path)) {
            $this->prize_image_path = $filename; // сохраняем только имя
            return true;
        }

        return false;
    }
}
