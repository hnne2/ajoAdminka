<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=landing_db',
    'username' => 'limkorm-check-bot',
    'password' => 'ombonSULmireVIvINIgenta',
    'charset' => 'utf8mb4',

    // Включи эмуляцию подготовленных запросов, если надо:
    'attributes' => [
        PDO::ATTR_EMULATE_PREPARES => true,
    ],
];