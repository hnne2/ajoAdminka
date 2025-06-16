<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq_items".
 *
 * @property int $id
 * @property string|null $title
 * @property string $label
 * @property string $content
 * @property string $created_at
 */
class FaqItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'default', 'value' => 'Вопрос-ответ'],
            [['label', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'label'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'label' => 'Label',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Автоматическая установка created_at перед сохранением новой записи
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->created_at = date('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }
}
