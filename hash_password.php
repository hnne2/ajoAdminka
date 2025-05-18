<?php
// Получаем пароль из аргумента командной строки или используем 'admin' по умолчанию
$password = $argv[1] ?? 'admin';
// Генерируем хеш пароля с использованием алгоритма BCRYPT
$hash = password_hash($password, PASSWORD_BCRYPT);
// Выводим хеш
echo "Password hash: $hash\n";
