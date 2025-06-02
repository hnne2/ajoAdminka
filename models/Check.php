<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $inn
 * @property string|null $title
 * @property float|null $weight
 * @property string|null $address
 * @property string|null $status
 * @property string|null $moderation_comment
 * @property string|null $image_filename
 * @property string|null $uploaded_at
 * @property string|null $processed_at
 * @property int|null $is_prize_sent
 *
 * @property Prizes[] $prizes
 * @property ScratchCards[] $scratchCards
 * @property Users $user
 */
class Check extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * ENUM field values
     */
    const STATUS_SCANNED_SUCCESS = 'scanned_success';
    const STATUS_MANUAL_REVIEW = 'manual_review';
    const STATUS_REJECTED = 'rejected';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inn', 'title', 'weight', 'address', 'moderation_comment', 'processed_at'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 'manual_review'],
            [['is_prize_sent'], 'default', 'value' => 0],
            [['user_id'], 'required'],
            [['user_id', 'is_prize_sent'], 'integer'],
            [['weight'], 'number'],
            [['status', 'moderation_comment'], 'string'],
            [['uploaded_at', 'processed_at'], 'safe'],
            [['inn'], 'string', 'max' => 20],
            [['title', 'address','image_filename'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Пользователь',
            'image_filename ' => 'изображение',
            'inn' => 'ИНН',
            'title' => 'Название',
            'weight' => 'Вес',
            'address' => 'Адрес',
            'status' => 'Статус',
            'moderation_comment' => 'Комментарий модератора',
            'uploaded_at' => 'Дата загрузки',
            'processed_at' => 'Дата обработки',
            'is_prize_sent' => 'Приз отправлен',
        ];
    }

    /**
     * Gets query for [[Prizes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrizes()
    {
        return $this->hasMany(Prizes::class, ['check_id' => 'id']);
    }


    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }

    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_SCANNED_SUCCESS => 'scanned_success',
            self::STATUS_MANUAL_REVIEW => 'manual_review',
            self::STATUS_REJECTED => 'rejected',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->uploaded_at = date('Y-m-d H:i:s');
            }

            if ($this->status === self::STATUS_SCANNED_SUCCESS && $this->processed_at === null) {
                $this->processed_at = date('Y-m-d H:i:s');
            }

            return true;
        }
        return false;
    }
    /**
     * Загрузка файла изображения и сохранение пути
     *
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $uploadDir = '/home/gri/uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '.' . $this->imageFile->extension;
            $fullPath = $uploadDir . $fileName;

            if ($this->imageFile->saveAs($fullPath)) {
                $this->image_filename = $fileName;
                return true;
            }
        }

        return false;
    }
}
