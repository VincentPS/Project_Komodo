<?php

    /**
    */
    class Register extends Database
    {

        /**
        */
        public function __construct()
        {
            $this->connectWithDatabase();
        }

        /**
        */
        public function registerNewUser()
        {
            if (empty($_POST['user_name'])) {
                $application->errors[] = "Empty Username";
            } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
                $application->errors[] = "Empty Password";
            } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
                $application->errors[] = "Password and password repeat are not the same";
            } elseif (strlen($_POST['user_password_new']) < 6) {
                $application->errors[] = "Password has a minimum length of 6 characters";
            } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
                $application->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
            } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
                $application->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
            } elseif (empty($_POST['user_email'])) {
                $application->errors[] = "Email cannot be empty";
            } elseif (strlen($_POST['user_email']) > 64) {
                $application->errors[] = "Email cannot be longer than 64 characters";
            } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
                $application->errors[] = "Your email address is not in a valid email format";
            } elseif (!empty($_POST['user_name'])
                && strlen($_POST['user_name']) <= 64
                && strlen($_POST['user_name']) >= 2
                && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
                && !empty($_POST['user_email'])
                && strlen($_POST['user_email']) <= 64
                && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
                && !empty($_POST['user_password_new'])
                && !empty($_POST['user_password_repeat'])
                && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
            ) {
                // create a database connection
                $this->database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                // change character set to utf8 and check it
                if (!$this->database->set_charset("utf8")) {
                    $application->errors[] = $this->database->error;
                }

                // if no connection errors (= working database connection)
                if (!$this->database->connect_errno) {

                    // escaping, additionally removing everything that could be (html/javascript-) code
                    $user_name = $this->database->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                    $user_email = $this->database->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                    $user_password = $_POST['user_password_new'];

                    // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                    // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                    // PHP 5.3/5.4, by the password hashing compatibility library
                    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                    // check if user or email address already exists
                    $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_email . "';";
                    $query_check_user_name = $this->database->query($sql);

                    if ($query_check_user_name->num_rows == 1) {
                        $application->errors[] = "Sorry, that username / email address is already taken.";
                    } else {

                        // write new user's data into database
                        $sql = "INSERT INTO users (user_name, user_password_hash, user_email)
                                VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');";
                        $query_new_user_insert = $this->database->query($sql);

                        // if user has been added successfully
                        if ($query_new_user_insert) {
                            $this->messages[] = "Your account has been created successfully. You can now log in.";
                        } else {
                            $application->errors[] = "Sorry, your registration failed. Please go back and try again.";
                        }
                    }
                } else {
                    $application->errors[] = "Sorry, no database connection.";
                }
            } else {
                $application->errors[] = "An unknown error occurred.";
            }
        }
    }
