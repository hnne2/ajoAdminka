<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property string $prize
 * @property string $lottery_id
 * @property string $created_at
 * @property int $is_processed
 */

class Feedback extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'tel', 'email', 'prize'], 'required'],
            [['name', 'email', 'prize', 'lottery_id'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 20],
            [['created_at'], 'safe'],
            [['lottery_id'], 'default', 'value' => 0],
            [['is_processed'], 'boolean'],
            [['is_processed'], 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'tel' => 'Телефон',
            'email' => 'Email',
            'prize' => 'Приз',
            'lottery_id' => 'ID Розыгрыша',
            'created_at' => 'Дата создания',
            'is_processed' => 'Обработано',

        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                 $timezone = new \DateTimeZone('Europe/Moscow');
                 $datetime = new \DateTime('now', $timezone);
                 $this->created_at = $datetime->format('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }

}
