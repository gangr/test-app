<?php

    // Include config and routes
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/routes.php';

    // Set directories paths as constants
    define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);
    define('SRC_DIR', $_SERVER['DOCUMENT_ROOT'] . $config['srcDir']);
    define('VIEWS_DIR', $_SERVER['DOCUMENT_ROOT'] . $config['viewsDir']);
    define('ASSETS_PATH', $_SERVER['HTTP_HOST'] . $config['assetsDir']);

    // Autoload classes
    spl_autoload_register(function($className) {
        $classes = [];
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
        include_once SRC_DIR . $className . '.php';
        $classes[] = $className;
    });

    // Check db and create it if not exists
    $db = new \Services\DbService();
    $db->checkDb();

    // Routing
    $app = new \Services\RouterService();
    $app->followRoute();



