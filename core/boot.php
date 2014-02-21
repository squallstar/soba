<?php

define('SOBA_START_TIME', microtime(true));

define('BASE_PATH', __DIR__ . '/../');

// Register the classes autoloader
spl_autoload_register(function($class)
{
  require_once str_replace('\\', '/', $class) . '.php';
});

// Boots the app
return new \Soba\Application;