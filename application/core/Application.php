<?php

    //
    class Application
    {

        //
        private $db;
        public $data = [];

        //
        public function __construct()
        {

            //
            require APP . 'view/header.php';
            require APP . 'view/index.php';
            require APP . 'view/footer.php';

            //
            $this->connectDatabase();
        }

        //
        private function connectDatabase()
        {

            //
            try {
                $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                print '<script>alert("Error! ' . $e->getMessage() . '<br/>");</script>';
                die();
            }

            //
            $this->data = [
                'abilities' => $this->executeQuery('SELECT * FROM abilities'),
                'bestiary'  => $this->executeQuery('SELECT * FROM bestiary'),
                'items'     => $this->executeQuery('SELECT * FROM items')
            ];
        }

        //
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
