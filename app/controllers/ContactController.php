<?php
    class ContactController extends Controller {
        public function __construct() {
            $this->donorModel = $this->model('Contact');
        }

        /**
         * @@index - fn to read all registered contacts
         */
        public function index() {
            echo 'We are in ' . __CLASS__ . ' under action ' . __METHOD__ . '<br/>';

            $this->view('contact/index');
        }

        /**
         * @@createcontact - as the name says,
         * fn to create (register) a new contact
         */
        public function createcontact($myContact) {
            $data = [
                'first_name'            => '',
                'last_name'             => '',
                'email'                 => '',
                'organisation'          => '',
                'country'               => '',
                'message'               => '',
                'name_error'            => '',
                'email_error'           => '',
                'name_error'            => '',
                'message_error'         => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form; first sanitise input data
                $_POST = filter_input_array(INPUT_POST, FILTER_REQUIRE_ARRAY);

                $horse = new HorseWork();
                
                $data = [
                    'first_name'            => $horse->clean_input($_POST['first_name']),
                    'last_name'             => $horse->clean_input($_POST['last_name']),
                    'email'                 => $horse->clean_input($_POST['email']),
                    'organisation'          => $horse->clean_input($_POST['organisation']),
                    'country'               => $horse->clean_input($_POST['country']),
                    'message'               => $horse->clean_input($_POST['message']),
                    'name_error'            => '',
                    'email_error'           => '',
                    'name_error'            => '',
                    'message_error'         => ''
                ];

                $name_validation = "/^[a-zA-Z0-9\-]*$/";
                $email_validation = "/^[a-zA-Z0-9.! #$%&'*+/=? ^_`{|}~-]+@[a-zA-Z0-9-]+(?:\. [a-zA-Z0-9-]+)*$/.";

                // Validate first_name on alphanumeric
                if(empty($data['first_name'])) {
                    $data['first_name_error'] = 'Please, enter the name of the first';
                } elseif(!preg_match($name_validation, $data['first_name'])) {
                    $data['first_name_error'] = 'Name can contain letters and numbers';
                }

                // Validate last_name on alphanumeric
                if(empty($data['last_name'])) {
                    $data['last_name_error'] = 'Please, enter the name of the last';
                } elseif(!preg_match($name_validation, $data['last_name'])) {
                    $data['last_name_error'] = 'Name can contain letters and numbers';
                }

                // Validate donor's contact email
                if(empty($data['email'])) {
                    $data['email_error'] = 'Please, enter contact email address';
                } elseif(!preg_match($email_validation, $data['email'])) {
                    $data['email_error'] = 'You have entered an invalide email address';
                } elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_error'] = 'Please enter the correct format.';
                } else {
                    // Check if email address already exists
                    if($this->userModel->find_donor_by_email($data['email'])) {
                        $data['email_error'] = 'This email address is already registered';
                    }
                }

                // Ensure that organisation is not blank
                if(empty($data['organisation'])) {
                    $data['organisation_error'] = "Organisation's name is required";
                }

                // Ensure that organisation is not blank
                if(empty($data['country'])) {
                    $data['country_error'] = "Country's name is required";
                }

                // Ensure that organisation is not blank
                if(empty($data['message'])) {
                    $data['message_error'] = "Message is required";
                }

                // Ensure that all errors are empty
                if(empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['organisation_error']) &&
                empty($data['country_error']) && empty($data['message_error'])) {
                    // Can now create & register a contact
                    if($this->contactModel->createcontact($data)) {
                        // Redisrect to home page
                        header('location:' . URL_ROOT . '/home/index', 'Thank you for your query');
                    } else {
                        die('ERROR: Contact registration failed!');
                    }
                }
            }
            $this->view('contact/createcontact', $data);
        }
    }