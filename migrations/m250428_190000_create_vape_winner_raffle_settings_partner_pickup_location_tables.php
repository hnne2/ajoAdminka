<?php

use yii\db\Migration;

/**
 * Handles the creation of tables `{{%vape}}`, `{{%winner}}`, `{{%raffle_settings}}`, `{{%partner}}`, and `{{%pickup_location}}`.
 */
class m250428_190000_create_vape_winner_raffle_settings_partner_pickup_location_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Таблица для vape
        $this->createTable('{{%vape}}', [
            'id' => $this->primaryKey(),
            'sort' => $this->string()->notNull(),
            'flavor_list' => $this->string()->notNull(),
            'sweetness' => $this->float()->notNull(),
            'ice_level' => $this->float()->notNull(),
            'sourness' => $this->float()->notNull(),
            'image_path' => $this->string(255)->null(),
	     'is_top15' => %this ->tinyint() -> null(),
        ]);

        // Таблица для победителей
        $this->createTable('{{%winner}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(20)->notNull(),
            'telegram_nick' => $this->string(100)->notNull(),
            'date' => $this->date()->notNull(),
            'time' => $this->time()->notNull(),
            'prize' => $this->string(255)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Таблица для настроек розыгрыша
        $this->createTable('{{%raffle_settings}}', [
            'id' => $this->primaryKey(),
            'probability' => $this->float()->notNull()->defaultValue(0.1),
            'prize' => $this->text()->notNull(), // Текст с форматированием через CKEditor
            'prize_image_path' => $this->string(255)->null(), // Путь к изображению приза
            'pickup_location' => $this->string(255)->notNull(),
            'max_prizes' => $this->integer()->notNull()->defaultValue(10),
            'latitude' => $this->float()->null(), // Широта
            'longitude' => $this->float()->null(), // Долгота
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Таблица для партнеров
        $this->createTable('{{%partner}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'phone' => $this->string(20)->notNull(),
            'email' => $this->string(255)->null(),
            'telegram_nick' => $this->string(100)->null(),
            'message' => $this->text()->null(), // Сообщение (большое текстовое поле)
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Таблица для адресов выдачи
        $this->createTable('{{%pickup_location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(), // Название места выдачи
            'address' => $this->string(255)->notNull(), // Адрес
            'latitude' => $this->float()->null(), // Широта
            'longitude' => $this->float()->null(), // Долгота
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pickup_location}}');
        $this->dropTable('{{%partner}}');
        $this->dropTable('{{%raffle_settings}}');
        $this->dropTable('{{%winner}}');
        $this->dropTable('{{%vape}}');
    }
}
