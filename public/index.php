<?php

    // checking for minimum PHP version
    if (version_compare(PHP_VERSION, '5.3.7', '<')) {
        exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
    } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
        require_once("libraries/password_compatibility_library.php");
    }

    // includes the php files
    require_once("../application/config/config.php");
    require_once("../application/core/application.php");

    // creates the application object
    $APP = new Application();

    // load the game or the login page
    if ($APP->isUserLoggedIn() == true) {
        include("../application/view/hero.php");
    } else {
        include("../application/view/login.php");
    }
