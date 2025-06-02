<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "draws".
 *
 * @property int $id
 * @property string $date
 * @property string $prize_type
 * @property int|null $quantity
 * @property int|null $remaining_quantity
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Draw extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const PRIZE_TYPE_TSHIRT = 'tshirt';
    const PRIZE_TYPE_OZON_CARD = 'ozon_card';
    const PRIZE_TYPE_VK_FEST_TICKET = 'vk_fest_ticket';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'draws';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['remaining_quantity'], 'default', 'value' => 0],
            [['date', 'prize_type'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['prize_type'], 'string'],
            [['quantity', 'remaining_quantity'], 'integer'],
            ['prize_type', 'in', 'range' => array_keys(self::optsPrizeType())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'prize_type' => 'Тип приза',
            'quantity' => 'Количество',
            'remaining_quantity' => 'Осталось',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
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
            $now = date('Y-m-d H:i:s');

            if ($insert) {
                $this->created_at = $now;  // при создании
            }

            $this->updated_at = $now; // при создании и обновлении

            return true;
        }
        return false;
    }
}
