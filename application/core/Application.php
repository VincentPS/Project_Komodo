<?php

    /**
    */
    class Application extends Database
    {

        /**
        */
        public $errors = [];
        public $messages = [];
        private $login;
        private $register;

        /**
        */
        public function __construct()
        {
            session_start();
            $this->login = new Login();
            $this->register = new Register();
            $this->connectWithDatabase();
            $this->determineStartFunction();
        }

        /**
        */
        public function render()
        {
            include_once(APP . 'view/templates/header.php');
            if ($this->login->didUserChooseHero() === true) {
                include_once(APP . 'view/indexes/game.php');
            } else {
                include_once(APP . 'view/indexes/login.php');
                if ($this->login->isUserLoggedIn() === true) {
                    include_once(APP . 'view/indexes/hero.php');
                } else {
                    include_once(APP . 'view/indexes/register.php');
                }
            }
            include_once(APP . 'view/templates/footer.php');
        }

        /**
        */
        private function determineStartFunction()
        {
            if (isset($_POST["logout"])) {
                $this->login->logoutUser();
            } elseif (isset($_POST["login"])) {
                $this->login->loginUser();
            } elseif (isset($_POST['register'])) {
                $this->register->registerNewUser();
            }
        }
    }
