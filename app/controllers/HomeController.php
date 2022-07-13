<?php
    class HomeController extends Controller {
        public function index() {
            $this->view('home/index');
        }


        public function mipteam() {
            $this->view('home/mipteam');
        }
    }