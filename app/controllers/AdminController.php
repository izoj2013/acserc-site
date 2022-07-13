<?php
    class AdminController extends Controller {
        private $donorModel;
        private $partnerModel;

        public function __construct() {
            $this->adminModel = $this->model('Admin');
            $this->donorModel = $this->model('Donor');
            $this->partnerModel = $this->model('Partner');
        }

        /**
         * @@login - funtion to sign in
         */
        public function login() {
            $data = [
                'title' => 'Login Page',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];

            // Check for posted data
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitise the posted data
                $_POST = filter_input_array(INPUT_POST);

                $horse = new HorseWork();
                $validator = new MipValidator();

                $data = [
                    'username' => $horse->clean_input($_POST['username']),
                    'password' => $horse->clean_input($_POST['password']),
                    'usernameError' => '',
                    'passwordError' => ''
                ];

                // Validate input data
                $data['usernameError'] = $validator->validateName($data['username'], 'Username');
                $data['passwordError'] = $validator->validatePassword($data['password']);

                // Ensure that there are no errors
                if(empty($data['username']) && empty($data['password'])) {
                    $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']);

                    // Check for admin authentication
                    if($loggedInAdmin) {
                        $this->createAdminSession($loggedInAdmin);
                    } else {
                        $data['usernameError'] = $data['passwordError'] = 'Password or username is incorrect. Please, try, again';

                        // Stay on the login window
                        $this->view('admin/login', $data);
                    }
                }
            }
            $this->view('admin/login', $data);
        }

        /**
         * @@createAdminSession - each admin log in
         * associate it with an active session
         */
        public function createAdminSession($admin) {
            session_start();
            $_SESSION['admin_id'] = $admin->id;
            $_SESSION['username'] = $admin->username;
            $_SESSION['email'] = $admin->email;

            // Redirect to Admin dashboard
            header('Location:' . URL_ROOT . '/admin/dashboard');
        }

        /**
         * @@logout - for signing off.
         */
        public function logout() {
            unset($_SESSION['admin_id']);
            unset($_SESSION['username']);
            unset($_SESSION['email']);

            // Redirect to home page
            header('Location:' . URL_ROOT . '/home/index');
        }


        /* ======== PARTNERS ======= */
        /**
         * @@listAllPartners - fn that retrieves all registered
         * partners from the DB and display the list on a page
         */
        public function listPartners() {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__;
            $this->isAdmin();

            $partners = $this->partnerModel->getPartners();
            $this->view('admin/listpartners', $partners);
        }


        /**
         * @@editPartner - fn that helps
         * to edit a registered partner
         */
        public function editPartner($partner_id) {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__;
            $this->isAdmin();

            $this->view('admin/editpartner');
        }


        /**
         * @@archivePartner - fn that simply
         * archives a registered partner
         */
        public function archivePartner($partner_id) {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__;
            $this->isAdmin();

            $this->view('admin/archivepartner');
        }

        /**
         * @@updatePartner - fn that updates
         * a registered partner when needed
         */
        public function updatePartner($partner_id) {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__;
            $this->isAdmin();

            $this->view('admin/updatepartner');
        }


        /* ======== HELPER FN ======= */
        /**
         * @@isAdmin - fn that checks if the user
         * requesting a resource is an admin
         */
        private function isAdmin() {
            if(!isLoggedIn()) {
                header('Location: ' . URL_ROOT . "/home/index");
            }
        }
    }