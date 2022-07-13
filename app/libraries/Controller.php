<?php
    // Controller class, part of the MVC
    class Controller {
        /**
         * @@model - function that
         * initialises the model
         */
        public function model($modelName) {
            $modelFilePath = MODELS . $modelName . '.php';
            // Check if model file exists
            if(file_exists($modelFilePath)) {
                require_once $modelFilePath;

                // Instantiate the model
                return new $modelName();
            } else {
                die('Model does not exist');
            }
        }

        /**
         * @@view - function that checks
         * for the presence of a view
         */
        public function view($viewFile, $data=[]) {
            $viewFilePath = VIEWS . $viewFile . '.php';
            // Check if view file is present
            if(file_exists($viewFilePath)) {
                require_once $viewFilePath;
            } else {
                die('View does not exist');
            }
        }
    }