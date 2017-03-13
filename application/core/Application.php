<?php

/**
*/
class Application
{

    /**
    */
    private $database = null;
    public $errors = [];
    public $messages = [];
    public $data = [];

    /**
    */
    public function __construct()
    {
        $this->connectWithDatabase();
        $this->getRequiredGameData();

        session_start();

        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_GET["logout"])) {
            $this->logoutUser();
        } elseif (isset($_POST["login"])) {
            $this->loginUser();
        } elseif (isset($_POST['register'])) {
            $this->registerNewUser();
        }
    }

    /**
    */
    private function connectWithDatabase()
    {
        try{
            $this->database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        } catch(PDOExeption $e) {
            print 'ERROR! ' . $e->getMessage() . '<br>';
            die();
        }
    }

    /**
    */
    private function getRequiredGameData()
    {
        $this->data = [
            'abilities' => $this->executeQuery('SELECT * FROM abilities'),
            'bestiary'  => $this->executeQuery('SELECT * FROM bestiary'),
            'items'     => $this->executeQuery('SELECT * FROM items'),
            'hero'      => $this->executeQuery('SELECT * FROM hero')
        ];
    }

    /**
    */
    private function executeQuery($param)
    {
        $query = $this->database->prepare($param);
        $query->execute();
        $result = [];
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $result[$row['id']] = filter_var_array($row, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }
        return $result;
    }

    /**
    */
    private function loginUser()
    {
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->database->set_charset("utf8")) {
                $this->errors[] = $this->database->error;
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
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    $this->errors[] = "This user does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    /**
    */
    private function registerNewUser()
    {
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Empty Username";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Empty Password";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Password and password repeat are not the same";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Password has a minimum length of 6 characters";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Username cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $this->errors[] = "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Email cannot be empty";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
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
                $this->errors[] = $this->database->error;
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
                    $this->errors[] = "Sorry, that username / email address is already taken.";
                } else {

                    // write new user's data into database
                    $sql = "INSERT INTO users (user_name, user_password_hash, user_email)
                            VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "');";
                    $query_new_user_insert = $this->database->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = "Your account has been created successfully. You can now log in.";
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
    }

    /**
     * perform the logout
     */
    public function logoutUser()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
    */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
