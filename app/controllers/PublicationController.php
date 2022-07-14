<?php
    class PublicationController extends Controller {
        // public function __construct() {
        //     $this->publicationModel = $this->model('Publication');
        // }

        public function index() {
            $this->view('publication/index');
        }

        public function display2() {
            $this->view('publication/displayaww2');
        }


        /**
         * @@displayAWW1Publication - fn that displays a
         * page containing the said (AWW1) publication
         */
        public function displayAWW1Publication() {
            echo 'Here in: ' . __CLASS__ . ' under the method: ' . __METHOD__ . '<br/>';
            $this->view('publication/displayaww1');
        }


        /**
         * @@displayAWW2Publication - fn that displays a
         * page containing the said (AWW2) publication
         */
        public function displayAWW2Publication() {
            echo 'Here in: ' . __CLASS__ . ' under the method: ' . __METHOD__ . '<br/>';
            $this->view('publication/displayaww2');
        }
    }