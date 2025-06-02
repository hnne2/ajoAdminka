<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prizes".
 *
 * @property int $id
 * @property int $user_id
 * @property int $check_id
 * @property string $prize_type
 * @property string|null $status
 * @property string|null $sent_at
 * @property string|null $notes
 *
 * @property Check $check
 * @property Users $user
 */
class Prize extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const PRIZE_TYPE_TSHIRT = 'tshirt';
    const PRIZE_TYPE_OZON_CARD = 'ozon_card';
    const PRIZE_TYPE_VK_FEST_TICKET = 'vk_fest_ticket';
    const STATUS_PENDING = 'pending';
    const STATUS_SENT = 'sent';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sent_at', 'notes'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 'pending'],
            [['user_id', 'check_id', 'prize_type'], 'required'],
            [['user_id', 'check_id'], 'integer'],
            [['prize_type', 'status', 'notes'], 'string'],
            [['sent_at'], 'safe'],
            ['prize_type', 'in', 'range' => array_keys(self::optsPrizeType())],
            ['status', 'in', 'range' => array_keys(self::optsStatus())],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
            [['check_id'], 'exist', 'skipOnError' => true, 'targetClass' => Check::class, 'targetAttribute' => ['check_id' => 'id']],
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
            'check_id' => 'Чек',
            'prize_type' => 'Тип приза',
            'status' => 'Статус',
            'sent_at' => 'Отправлен',
            'notes' => 'Примечания',
        ];

    }

    /**
     * Gets query for [[Check]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheck()
    {
        return $this->hasOne(Check::class, ['id' => 'check_id']);
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
     * column prize_type ENUM value labels
     * @return string[]
     */
    public static function optsPrizeType()
    {
        return [
            self::PRIZE_TYPE_TSHIRT => 'tshirt',
            self::PRIZE_TYPE_OZON_CARD => 'ozon_card',
            self::PRIZE_TYPE_VK_FEST_TICKET => 'vk_fest_ticket',
        ];
    }

    /**
     * column status ENUM value labels
     * @return string[]
     */
    public static function optsStatus()
    {
        return [
            self::STATUS_PENDING => 'pending',
            self::STATUS_SENT => 'sent',
        ];
    }

    /**
     * @return string
     */
    public function displayPrizeType()
    {
        return self::optsPrizeType()[$this->prize_type];
    }

    /**
     * @return bool
     */
    public function isPrizeTypeTshirt()
    {
        return $this->prize_type === self::PRIZE_TYPE_TSHIRT;
    }

    public function setPrizeTypeToTshirt()
    {
        $this->prize_type = self::PRIZE_TYPE_TSHIRT;
    }

    /**
     * @return bool
     */
    public function isPrizeTypeOzoncard()
    {
        return $this->prize_type === self::PRIZE_TYPE_OZON_CARD;
    }

    public function setPrizeTypeToOzoncard()
    {
        $this->prize_type = self::PRIZE_TYPE_OZON_CARD;
    }

    /**
     * @return bool
     */
    public function isPrizeTypeVkfestticket()
    {
        return $this->prize_type === self::PRIZE_TYPE_VK_FEST_TICKET;
    }

    public function setPrizeTypeToVkfestticket()
    {
        $this->prize_type = self::PRIZE_TYPE_VK_FEST_TICKET;
    }

    /**
     * @return string
     */
    public function displayStatus()
    {
        return self::optsStatus()[$this->status];
    }

    /**
     * @return bool
     */
    public function isStatusPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function setStatusToPending()
    {
        $this->status = self::STATUS_PENDING;
    }

    /**
     * @return bool
     */
    public function isStatusSent()
    {
        return $this->status === self::STATUS_SENT;
    }

    public function setStatusToSent()
    {
        $this->status = self::STATUS_SENT;
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Если статус изменился на "sent" и поле sent_at пустое — установить текущее время
            if ($this->isStatusSent() && empty($this->sent_at)) {
                $this->sent_at = date('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }
}
