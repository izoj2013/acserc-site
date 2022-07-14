<?php
    class DonorController extends Controller {
        public function __construct() {
            $this->donorModel = $this->model('Donor');
        }


        /**
         * @@registerDonor - fn that displays a view
         * to enable a user to enter donor's details
         */
        public function createDonor() {
            echo 'Here in: ' . __CLASS__ . ' under the method: ' . __METHOD__ . '<br/>';
            $this->view('donor/createdonor');
        }


        /**
         * @@createDonor - fn that collects
         * user input data and create a donor
         */
        public function insertDonor() {
            $data = [
                'donor_name'            => '',
                'contact_email'          => '',
                'organisation_name'     => '',
                'donor_type'            => '',
                'pledge_amount'         => '',
                'donor_name_error'      => '',
                'contact_email_error'   => '',
                'donor_type_error'      => '',
                'pledge_amount_error'   => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form; first sanitise input data
                $_POST = filter_input_array(INPUT_POST, FILTER_REQUIRE_ARRAY);

                $horse = new HorseWork();
                $checker = new MipValidator();

                $data = [
                    'donor_name'            => $horse->clean_input($_POST['donor_name']),
                    'contact_email'         => $horse->clean_input($_POST['contact_email']),
                    'organisation_name'     => $horse->clean_input($_POST['organisation_name']),
                    'donor_type'            => $horse->clean_input($_POST['donor_type']),
                    'pledge_amount'         => $horse->clean_input($_POST['pledge_amount']),
                    'donor_name_error'      => '',
                    'contact_email_error'   => '',
                    'donor_type_error'      => '',
                    'pledge_amount_error'   => ''
                ];

                $donor_name_validation = "/^[a-zA-Z0-9]*$/";
                $contact_email_validation = "/^[a-zA-Z0-9.! #$%&'*+/=? ^_`{|}~-]+@[a-zA-Z0-9-]+(?:\. [a-zA-Z0-9-]+)*$/.";

                // Validate donor_name on alphanumeric
                if(empty($data['donor_name'])) {
                    $data['donor_name_error'] = 'Please, enter the name of the donor';
                } elseif(!preg_match($donor_name_validation, $data['donor_name'])) {
                    $data['donor_name_error'] = 'Name can contain letters and numbers';
                }

                // Validate donor's contact email
                if(empty($data['contact_email'])) {
                    $data['contact_email_error'] = 'Please, enter contact email address';
                } elseif(!preg_match($contact_email_validation, $data['contact_email'])) {
                    $data['contact_email_error'] = 'You have entered an invalide email address';
                } elseif(!filter_var($data['contact_email'], FILTER_VALIDATE_EMAIL)) {
                    $data['contact_email_error'] = 'Please enter the correct format.';
                } else {
                    // Check if email address already exists
                    if($this->userModel->find_donor_by_email($data['contact_email'])) {
                        $data['contact_email_error'] = 'This email address is already registered';
                    }
                }

                // Check if donor type is blank
                if(empty($data['donor_type'])) {
                    $data['donor_type_error'] = 'Please, enter donor type';
                }

                // Check if pledged amount is blank
                if(empty($data['pledge_amount'])) {
                    $data['pledge_amount_error'] = 'Pledged amount cannot be blank';
                }

                // Ensure that all errors are empty
                if(empty($data['donor_name_error']) && empty($data['contact_email_error']) && empty($data['donor_type_error']) && empty($data['pledge_amount_error'])) {
                    // Create a donor record from the model
                    if($this->donorModel->create_donor($data)) {
                        // Redirect to home page
                        header('location:' . URL_ROOT . '/app/views/index', 'donor bas been registered!');
                    } else {
                        die('ERROR: Donor registration has failed!');
                    }
                }
            }
            $this->view('pages/donor_form', $data);
        }


        /**
         * @@listAllDonors - fn that retrieves all registered
         * donors from the DB and display the list on a page
         */
        public function listDonors() {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__ . '<br/>';

            // $donors = $this->donorModel->getDonors();
            $this->view('donor/listdonors');
        }


        /**
         * @@updateDonor - fn that updates
         * a registered donor when needed
         */
        public function updateDonor($donor_id) {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__ . '<br/>';

            $this->view('donor/updatedonor', $donor_id);
        }
    }