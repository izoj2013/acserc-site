<?php
    // Core class from libraries folder
    class Core {
        protected $currentController = 'HomeController';
        protected $currentMethod = 'index';
        protected $params = [];

        /**
         * @@__construct: constructor function
         */
        public function __construct() {
            echo 'We are in ' . __CLASS__ . ' under action: ' . __METHOD__ . '<br/>';
            $url = $this->getUrl();

            var_dump($url);

            if(file_exists(CONTROLLERS . ucfirst($url[0]) . 'Controller' . '.php')){
                // If file exists, set as controller
                $this->currentController = ucfirst($url[0]) . 'Controller';
                // Unset 0 Index
                unset($url[0]);
            }

            // Require the controller
            require_once CONTROLLERS . $this->currentController . '.php';

            // Instantiate controller class
            $this->currentController = new $this->currentController;

            // Check for second part of url
            if(isset($url[1])){
                // Check to see if method exists in controller
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    // Unset 1 index
                    unset($url[1]);
                }
            }

            // Get params
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        /**
         * @@getUrl fn: Helper function that
         * retrieves the url handed to the server
         */
        public function getUrl() {
            // echo 'We are in ' . __CLASS__ . ' under action: ' . __METHOD__ . '<br/>';
            if(isset($_SERVER['REQUEST_URI'])) {
                $url = $_SERVER['REQUEST_URI'];
                $url = rtrim($_SERVER['REQUEST_URI'], '/');
                // This ensures that the url is only string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);

                // Break up the url into an array
                $url = explode('/', $url);
                
                // var_dump($url);

                if($url[1] = "mipsite") {
                    $url = array_slice($url, 2);
                }

                return $url;
            }
        }
    }