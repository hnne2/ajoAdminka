<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partner".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string|null $telegram_nick
 * @property string|null $message
 * @property int $created_at
 * @property int $updated_at
 */
class Partner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'number', 'integerOnly' => true],
            [['name', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['telegram_nick'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя партнёра',
            'phone' => 'Телефон',
            'email' => 'Email',
            'telegram_nick' => 'Telegram ник',
            'message' => 'Сообщение',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
}
