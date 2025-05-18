<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pickup_location".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property float|null $latitude
 * @property float|null $longitude
 * @property int $created_at
 * @property int $updated_at
 */
class PickupLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pickup_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название точки',
            'address' => 'Адрес',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}
