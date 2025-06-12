<?php
namespace app\models;

use yii\db\ActiveRecord;

class Mail extends ActiveRecord
{
    public static function tableName()
    {
        return 'mail';
    }

    public function rules()
    {
        return [
            [['mail_address'], 'required'],
            [['mail_address'], 'email'],
        ];
    }
}