<?php

    /**
    */
    class Application
    {

        /**
        */
        private $db;
        public $data = [];

        /**
        */
        public function __construct()
        {
            $this->connect();
            $this->data = [
                'abilities' => $this->executeQuery('SELECT * FROM abilities'),
                'bestiary'  => $this->executeQuery('SELECT * FROM bestiary'),
                'items'     => $this->executeQuery('SELECT * FROM items')
            ];
        }

        /**
        */
        private function connect()
        {
            try {
                $this->db = new PDO('mysql:host=localhost;dbname=komodo', 'root', '');
            } catch (PDOException $e) {
                print '<script>alert("Error! ' . $e->getMessage() . '<br/>");</script>';
                die();
            }
        }

        /**
        */
        private function executeQuery($query)
        {
            $query = $this->db->prepare($query);
            $query->execute();
            $data = [];
            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $data[$row['id']] = filter_var_array($row, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
            return $data;
        }
    }

    $application = new Application();
