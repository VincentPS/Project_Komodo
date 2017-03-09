<?php

    // defines the ROOT and APP variable
    define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
    define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

    // includes the files
    require APP . 'config/config.php';
    require APP . 'core/application.php';

<<<<<<< HEAD
    // makes the game
    $game = new Application();
    $game->render();
=======
    // makes the application
    $App = new Application();
>>>>>>> Alpha 0.10
