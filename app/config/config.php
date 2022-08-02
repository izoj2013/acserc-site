<?php
    // DIRECTORY CONSTANTS
    define('APP_ROOT', dirname(dirname(__FILE__)));
    define('URL_ROOT', 'https://makingimpossiblepossible.com/mipsite');
    // define('URL_ROOT', 'https://localhost/mipsite');
    define('CONTROLLERS', APP_ROOT . DIRECTORY_SEPARATOR . 'controllers'. DIRECTORY_SEPARATOR);
    define('DATA', APP_ROOT . DIRECTORY_SEPARATOR . 'data'. DIRECTORY_SEPARATOR);
    define('LIBRARIES', APP_ROOT . DIRECTORY_SEPARATOR . 'libraries'. DIRECTORY_SEPARATOR);
    define('MODELS', APP_ROOT . DIRECTORY_SEPARATOR . 'models'. DIRECTORY_SEPARATOR);
    define('UTILS', APP_ROOT . DIRECTORY_SEPARATOR . 'utils'. DIRECTORY_SEPARATOR);
    define('VIEWS', APP_ROOT . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR);

    // DB CONFIG SETTINGS
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mipdb');

    // Site Name constants
    define('SITE_NAME', 'ACS-ERC: Making Impossible Possible!');
    define('ADMIN_SITE_NAME', 'ACS-ERC Site Administration');

    $modules = [APP_ROOT, CONTROLLERS, DATA, LIBRARIES, MODELS, UTILS, VIEWS];

    set_include_path(get_include_path() . PATH_SEPARATOR . implode(PATH_SEPARATOR, $modules));

    spl_autoload_register(function($class) {
        require $class . '.php';
    });