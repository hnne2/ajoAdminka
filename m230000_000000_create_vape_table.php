public function safeUp()
{
    $this->createTable('{{%vape}}', [
        'id' => $this->primaryKey(),
        'sort' => $this->string()->notNull(),              // Фрукты, Выпивка
        'flavor_list' => $this->string()->notNull(),       // Лимон, Манго...
        'sweetness' => $this->float()->notNull(),          // 0.0 - 2.0
        'ice_level' => $this->float()->notNull(),          // 0.0 - 2.0
        'sourness' => $this->float()->notNull(),           // 0.0 - 2.0
    ]);
}

public function safeDown()
{
    $this->dropTable('{{%vape}}');
}
