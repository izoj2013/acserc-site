<?php
    class Partner {
        private $db;

        /**
         * @@__construct - class constructor
         */
        public function __construct() {
            $this->db = new Database();
        }


        /**
         * @@getPartners - fn that retrieves
         * all registered partners from the DB
         */
        public function getPartners() {
            $this->db->query("SELECT * FROM partners_tbl");

            $result = $this->db->resultSet();
            return $result;
        }


        /**
         * @@updatePartner - fn that updates a registered
         * partner,provided that their id has been handed
         * in by the admin controller
         */
        public function updatePartner($partner_id) {
            $this->db->query("SELECT * FROM partners_tbl WHERE partner_id = :partner_id");

            // Bind query parameter
            $this->db->bind(':partner_id', $partner_id);

            $row = $this->db->single();
            return $row;
        }
    }