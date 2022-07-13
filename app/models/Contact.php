<?php
    class Contact {
        private $db;

        /**
         * @@__construct - class constructor
         */
        public function __construct() {
            $this->db = new Database();
        }

        /**
         * @@getContacts - fn that retrieves all
         * submitted contact messages from the DB
         */
        public function getContacts() {
            $this->db->query("SELECT * FROM contacts_tbl");

            $result = $this->db->resultSet();
            return $result;
        }
    }