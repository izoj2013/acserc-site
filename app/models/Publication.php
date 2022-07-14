<?php
    class Publication {
        private $db;

        /**
         * @@__construct - class constructor
         */
        public function __construct() {
            $this->db = new Database();
        }

        /**
         * @@getArticles - fn that retrieves all
         * submitted contact messages from the DB
         */
        public function getArticles() {
            // $this->db->query("SELECT * FROM contacts_tbl");

            // $result = $this->db->resultSet();
            // return $result;
        }
    }