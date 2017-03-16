<?php

    /**
    */
    define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
    define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

    /**
    */
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit('Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !');
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
        require_once(APP . 'libraries/password_compatibility_library.php');
    }

    /**
    */
    require_once(APP . 'config/config.php');
    require_once(APP . 'core/database.php');
    require_once(APP . 'core/login.php');
    require_once(APP . 'core/register.php');
    require_once(APP . 'core/application.php');

    /**
    */
    $application = new Application();
    $application->render();
    $data = $application->getRequiredGameData();

    var_dump($data);
