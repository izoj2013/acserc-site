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
         * @@createcontact - fn to create
         * (register) a new contact
         */
        public function createcontact($data) {
            $this->db->query("INSERT INTO donors_tbl (first_name, last_name, email, organisation, country, message) 
                            VALUES(:first_name, :last_name, :email, :organisation, :country, :message)");

            // Bind values
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':organisation', $data['organisation']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':message', $data['message']);

            // Execute query
            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * @@getContacts - fn that retrieves all
         * submitted contact messages from the DB
         */
        public function getcontacts() {
            $this->db->query("SELECT * FROM contacts_tbl");

            $result = $this->db->resultSet();
            return $result;
        }

        /**
         * @@find_contact_by_email - no duplicate email;
         * this fn ensures that email is unique
         */
        public function find_contact_by_email($email) {
            // Prepare query statement
            $this->db->query("SELECT COUNT(*) as count FROM contacts WHERE email = :email");

            // Bind email param to the email field
            $this->db->bind(':email', $email);

            // Verify if email already registered
            if($this->db->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }