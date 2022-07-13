<?php
    class Admin {
        private $db;

        /**
         * @@__construct - class constructor
         */
        public function __construct() {
            $this->db = new Database();
        }

        /**
         * @@getAdmins
         */
        public function getAdmins() {
            $this->db->query("SELECT * FROM admins_tbl");

            $result = $this->db->resultSet();

            return $result;
        }

        /**
         * @@registerAdmin - a fn to register admin user;
         * in the CRUD parlance, this is 'C' - create
         * Data will be passed in by the controller
         */
        public function registerAdmin($data) {
            $outcome = false;
            $this->db->query("INSERT INTO admins_tbl (username, password)
             VALUES(:username, :password)");

            // Bind parameters to values
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':passord', $data['passord']);

            if($this->db->execute()) {
                $outcome = true;
            }

            return $outcome;
        }

        /**
         * @@loginAdmin - fn that submits admin credentials;
         * then check to see if access can either granted, 
         * or denied to the admin user.
         */
        public function login($username, $secret) {
            $this->db->query("SELECT * FROM admins_tbl WHERE username = :username");

            // Bind username parameter
            $this->db->bind(':username', $username);

            $row = $this->db->single();
            $hashedPwd = $row->password;

            if(password_verify($secret, $hashedPwd)) {
                return $row;
            } else {
                return false;
            }
        }
    }