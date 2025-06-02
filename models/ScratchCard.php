<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scratch_cards".
 *
 * @property int $id
 * @property int $user_id
 * @property int $check_id
 * @property int $attempt_number
 * @property string|null $result
 * @property string|null $prize_type
 * @property string|null $created_at
 *
 * @property Check $check
 * @property Users $user
 */
class ScratchCard extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const RESULT_WIN = 'win';
    const RESULT_LOSE = 'lose';
    const PRIZE_TYPE_TSHIRT = 'tshirt';
    const PRIZE_TYPE_OZON_CARD = 'ozon_card';
    const PRIZE_TYPE_VK_FEST_TICKET = 'vk_fest_ticket';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scratch_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prize_type'], 'default', 'value' => null],
            [['result'], 'default', 'value' => 'lose'],
            [['user_id', 'check_id', 'attempt_number'], 'required'],
            [['user_id', 'check_id', 'attempt_number'], 'integer'],
            [['result', 'prize_type'], 'string'],
            [['created_at'], 'safe'],
            ['result', 'in', 'range' => array_keys(self::optsResult())],
            ['prize_type', 'in', 'range' => array_keys(self::optsPrizeType())],
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
            'attempt_number' => 'Номер попытки',
            'result' => 'Результат',
            'prize_type' => 'Тип приза',
            'created_at' => 'Создано',
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
     * column result ENUM value labels
     * @return string[]
     */
    public static function optsResult()
    {
        return [
            self::RESULT_WIN => 'win',
            self::RESULT_LOSE => 'lose',
        ];
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
     * @return string
     */
    public function displayResult()
    {
        return self::optsResult()[$this->result];
    }

    /**
     * @return bool
     */
    public function isResultWin()
    {
        return $this->result === self::RESULT_WIN;
    }

    public function setResultToWin()
    {
        $this->result = self::RESULT_WIN;
    }

    /**
     * @return bool
     */
    public function isResultLose()
    {
        return $this->result === self::RESULT_LOSE;
    }

    public function setResultToLose()
    {
        $this->result = self::RESULT_LOSE;
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
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert && empty($this->created_at)) {
                $this->created_at = date('Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }
}
