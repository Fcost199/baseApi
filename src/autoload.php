<?php

spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\models\\';
    $base_dir = __DIR__ . '/models/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\control\\';
    $base_dir = __DIR__ . '/control/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\models\\dao\\';
    $base_dir = __DIR__ . '/models/dao/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\models\\classes\\';
    $base_dir = __DIR__ . '/models/class/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\models\\bd\\';
    $base_dir = __DIR__ . '/models/bd/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\control\\util\\';
    $base_dir = __DIR__ . '/control/util/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\control\\scripts\\';
    $base_dir = __DIR__ . '/control/scripts/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class){
    $prefix = 'celebre\\src\\control\\router\\';
    $base_dir = __DIR__ . '/control/router/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});
spl_autoload_register(function ($class) {
    $prefix = 'PHPMailer\\PHPMailer\\';
    $base_dir = __DIR__.'/vendor/phpmailer/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = str_replace('\\', '/', $base_dir) . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        include_once $file;
    }
});