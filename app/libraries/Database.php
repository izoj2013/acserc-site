<?php
    // Database encapsuation of PDO
    class Database {
        // Config member variables
        private $dbHost = DB_HOST;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASS;
        private $dbName = DB_NAME;

        // DB params member variables
        private $stmt;
        private $dbHandler;
        private $error;

        /**
         * @@__construct - constructor function. 
         * Bootstrap for instantiating objects for this class
         */
        public function __construct() {
            $conn = 'mysql:host=' . $this->dbHost . ';dbName=' . $this->dbName;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);                 
            } catch (PDOException $pdoe) {
                $this->error = $pdoe->getMessage();
                echo $this->error;
            }
        }

        /**
         * @@query - function to prepare a DB query
         */
        public function query($sqlQuery) {
            $this->stmt = $this->dbHandler->prepare($sqlQuery);
        }

        /**
         * @@bind - function to bind db params to values
         */
        public function bind($param, $value, $type=null) {
            switch(is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                $type = PDO::PARAM_STR;
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        /**
         * @@execute - function to execute 
         * the db prepared statment
         */
        public function execute() {
            $this->stmt->execute();
        }

        /**
         * @@resultSet - function that
         * returns an array result
         */
        public function resultSet() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * @@single - function that returns
         * a specific row as an object
         */
        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        /**
         * @@ rowCount - function that
         * gets the row count
         */
        public function rowCount() {
            return $this->stmt->rowCount();
        }
    }