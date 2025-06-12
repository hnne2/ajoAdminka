<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prize_inventory".
 *
 * @property string $id
 * @property string $type
 * @property int $total_quantity
 * @property int|null $won_total
 * @property int|null $won_today
 * @property int|null $won_this_week
 * @property int $daily_limit
 * @property int $weekly_limit
 * @property string|null $updated_at
 * @property string|null $created_at
 * @property string|null $label
 * @property string|null $description
 * @property string|null $image
 * @property string|null $probability

 */
class PrizeInventory extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prize_inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_at', 'label', 'description', 'image'], 'default', 'value' => null],
            [['won_this_week'], 'default', 'value' => 0],
            [['id', 'type', 'total_quantity', 'daily_limit', 'weekly_limit'], 'required'],
            [['total_quantity', 'won_total', 'won_today', 'won_this_week', 'daily_limit', 'weekly_limit'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
            [['id'], 'string', 'max' => 36],
            [['type'], 'string', 'max' => 50],
            [['label', 'image'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['type'], 'unique'],
            [['id'], 'unique'],
            [['probability'], 'number'],
            [['probability'], 'default', 'value' => 0],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg,svg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип',
            'total_quantity' => 'Общее количество',
            'won_total' => 'Выиграно всего',
            'won_today' => 'Выиграно сегодня',
            'won_this_week' => 'Выиграно за неделю',
            'daily_limit' => 'Дневной лимит',
            'weekly_limit' => 'Недельный лимит',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания',
            'label' => 'Метка',
            'description' => 'Описание',
            'image' => 'Изображение',
            'probability' => 'Вероятность',
        ];
    }
    /**
     * Загрузка файла изображения и сохранение пути
     *
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $uploadDir = '/home/limkorm-check-bot/upload/';


            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileName = uniqid() . '.' . $this->imageFile->extension;
            $fullPath = $uploadDir . $fileName;

            if ($this->imageFile->saveAs($fullPath)) {
                $this->image = $fileName;
                return true;
            }
        }

        return false;
    }

}
