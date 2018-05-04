<?php
// Вывод ошибок
define("DEBUG", 1);
// Ключевые директории
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/gshop/core');
define("LIBS", ROOT . '/vendor/gshop/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("WIDGETS", ROOT . '/app/widgets');
define("THEME", '/themes/default');
define("LAYOUT", 'default');

//Текущий Домен
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$app_path = preg_replace("#[^/]+$#", '', $app_path);
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);

// Папка админки
define("ADMIN", PATH. '/admin');

// Подключение авозагрузчика композера
require_once ROOT . '/vendor/autoload.php';



