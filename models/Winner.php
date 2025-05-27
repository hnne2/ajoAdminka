<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Winner extends ActiveRecord
{
    public static function tableName()
    {
        return 'winner';
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
	 [['phone'], 'string', 'max' => 20],
            [['telegram_nick', 'date', 'time', 'prize'], 'required'],
            [['telegram_nick', 'prize'], 'string', 'max' => 255],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['time'], 'date', 'format' => 'php:H:i'],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_nick' => 'Ник в Telegram',
            'date' => 'Дата',
            'time' => 'Время',
            'prize' => 'Приз',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}