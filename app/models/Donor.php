<?php
    class Donor {
        private $db;

        /**
         * @@__construct - class constructor
         */
        public function __construct() {
            $this->db = new Database();
        }

        /**
         * @@getDonors - fn that retrieves
         * all registered donors from the DB
         */
        public function getDonors() {
            $this->db->query("SELECT * FROM donors_tbl");

            $result = $this->db->resultSet();
            return $result;
        }


        /**
         * @@createDonor - fn that persists details
         * of a registered donor into the database
         */
        public function createDonor($data) {
            $this->db->query("INSERT INTO donors_tbl (donor_name, contact_email, organisation, donor_type, pledge_amount) 
                            VALUES(:donor_name, :contact_email, :organisation, :donor_type, :pledge_amount)");

            // Bind values
            $this->db->bind(':donor_name', $data['donor_name']);
            $this->db->bind(':contact_email', $data['contact_email']);
            $this->db->bind(':organisation', $data['organisation']);
            $this->db->bind(':donor_type', $data['donor_type']);
            $this->db->bind(':pledge_amount', $data['pledge_amount']);

            // Execute query
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }