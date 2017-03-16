<?php

    /**
    */
    class Database
    {

        /**
        */
        protected $database = null;

        /**
        */
        protected function connectWithDatabase()
        {
            try {
                $this->database = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            } catch(PDOExeption $e) {
                print 'ERROR! ' . $e->getMessage() . '<br>';
                die();
            }
        }

        /**
        */
        public function getRequiredGameData()
        {
            $data = [];
            $tables = ['abilities', 'bestiary', 'items'];
            foreach ($tables as $table) {
                $query = $this->database->prepare('SELECT * FROM ' . $table);
                $query->execute();
                $result = [];
                foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
                    $result[$row['id']] = filter_var_array($row, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }
                $data[$table] = $result;
            }
            return $data;
        }
    }
