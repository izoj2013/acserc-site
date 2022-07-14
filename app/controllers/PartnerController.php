<?php
    class PartnerController extends Controller {
        public function __construct() {
            $this->partnerModel = $this->model('Partner');
        }


        /**
         * @@registerPartner - fn that displays a view
         * to enable a user to enter partner's details
        */
        public function createPartner() {
            echo 'Here in: ' . __CLASS__ . ' under the method: ' . __METHOD__ . '<br/>';
            $this->view('partner/createpartner');
        }


        /**
         * @@createDonor - fn that collects user
         * input data and create/register a partner
         */
        public function insertPartner() {
            $data = [
                'partner_name'              => '',
                'contact_email'             => '',
                'partnership_type'          => '',
                'description'               => '',
                'partnership_status'        => '',
                'partner_name_error'        => '',
                'contact_email_error'       => '',
                'partnership_type_error'    => '',
                'description_error'         => ''
            ];

            // Check if data has been posted by the user
            if(!empty($_SERVER['REQUEST_URI']) == 'POST') {
                // Sanitise the posted data
                $_POST = filter_input_array(INPUT_POST);
            }
        }

        /**
         * @@listAllPartners - fn that retrieves all registered
         * partners from the DB and display the list on a page
         */
        public function listPartners() {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__ . '<br/>';

            // $partners = $this->partnerModel->getPartners();
            $this->view('partner/listpartners');
        }


        /**
         * @@updatePartner - fn that updates
         * a registered partner when needed
         */
        public function updatePartner($partner_id) {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__ . '<br/>';

            $this->view('partner/updatepartner', $partner_id);
        }

        /**
         * @@deletePartner - fn that deletes a registered
         * partner when their project is completed 
         */
        public function deletePartner($parner_id) {
            echo 'Here under class: ' . __CLASS__ . ' and method ' . __METHOD__ . '<br/>';
            $this->view('partner/deletepartner');
        }
    }