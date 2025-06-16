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
            [['title'], 'default', 'value' => 'Ð’Ð¾Ð¿Ñ€Ð¾Ñ-Ð¾Ñ‚Ð²ÐµÑ‚'],
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

}
