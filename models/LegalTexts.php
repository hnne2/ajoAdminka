<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "legal_texts".
 *
 * @property int $id
 * @property string $rules_content
 * @property string $politika_content
 * @property string $agreement_content
 * @property string $email
 * @property string $created_at
 */
class LegalTexts extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'legal_texts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rules_content', 'politika_content', 'agreement_content'], 'required'],
            [['rules_content', 'politika_content', 'agreement_content'], 'string'],
            ['email', 'email'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rules_content' => 'Rules Content',
            'politika_content' => 'Politika Content',
            'agreement_content' => 'Agreement Content',
            'email' => 'Email',
            'created_at' => 'Created At',
        ];
    }

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
