<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Модель для таблицы `users`.
 *
 * @property int $id
 * @property string|null $telegram_id
 * @property string|null $contact_info
 * @property string|null $name
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Users extends ActiveRecord
{
    /**
     * Имя таблицы в базе данных
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * Правила валидации
     */
    public function rules()
    {
        return [
            [['telegram_id', 'contact_info', 'name'], 'string', 'max' => 255],
            [['telegram_id'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 100],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * Метки атрибутов
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telegram_id' => 'Telegram ID',
            'contact_info' => 'Контактная информация',
            'name' => 'Имя',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
