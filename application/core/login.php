<?php

    /**
    */
    class Login extends Database
    {

        /**
        */
        public function __construct()
        {
            $this->connectWithDatabase();
        }

        /**
        */
        public function logoutUser()
        {
            $_SESSION = array();
            session_destroy();
            $application->messages[] = "You have been logged out.";
        }

        /**
        */
        public function isUserLoggedIn()
        {
            if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
                return true;
            }
            return false;
        }

        /**
        */
        public function didUserChooseHero()
        {
            return false;
        }

        /**
        */
        public function loginUser()
        {
            // check login form contents
            if (empty($_POST['user_name'])) {
                $application->errors[] = "Username field was empty.";
            } elseif (empty($_POST['user_password'])) {
                $application->errors[] = "Password field was empty.";
            } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

                // create a database connection
                $this->database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                // change character set to utf8 and check it
                if (!$this->database->set_charset("utf8")) {
                    $application->errors[] = $this->database->error;
                }

                // if no connection errors (= working database connection)
                if (!$this->database->connect_errno) {

                    // escape the POST stuff
                    $user_name = $this->database->real_escape_string($_POST['user_name']);

                    // database query, getting all the info of the selected user (allows login via email address in the
                    // username field)
                    $sql = "SELECT user_name, user_email, user_password_hash
                            FROM users
                            WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                    $result_of_login_check = $this->database->query($sql);

                    // if this user exists
                    if ($result_of_login_check->num_rows == 1) {

                        // get result row (as an object)
                        $result_row = $result_of_login_check->fetch_object();

                        // using PHP 5.5's password_verify() function to check if the provided password fits
                        // the hash of that user's password
                        if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                            // write user data into PHP SESSION (a file on your server)
                            $_SESSION['user_name'] = $result_row->user_name;
                            $_SESSION['user_email'] = $result_row->user_email;
                            $_SESSION['user_login_status'] = 1;

                        } else {
                            $application->errors[] = "Wrong password. Try again.";
                        }
                    } else {
                        $application->errors[] = "This user does not exist.";
                    }
                } else {
                    $application->errors[] = "Database connection problem.";
                }
            }
        }
    }
