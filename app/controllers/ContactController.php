<?php
    class ContactController extends Controller {
        public function __construct() {
            $this->donorModel = $this->model('Contact');
        }
    }