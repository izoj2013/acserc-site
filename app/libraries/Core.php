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

            print_r($url);

            if(count($url) > 2) {
                var_dump($url[0]);
                var_dump($url[1]);
                var_dump($url[2]);
                // Look in BLL for first value
                if(file_exists(CONTROLLERS . ucfirst($url[2]) . 'Controller' . '.php')){
                    // If file exists, set as controller
                    $this->currentController = ucfirst($url[2]) . 'Controller';
                    // Unset 0 Index
                    unset($url[2]);
                }

                // Require the controller
                require_once CONTROLLERS . $this->currentController . '.php';

                // Instantiate controller class
                $this->currentController = new $this->currentController;

                // Check for second part of url
                if(isset($url[3])){
                    // Check to see if method exists in controller
                    if(method_exists($this->currentController, $url[3])){
                        $this->currentMethod = $url[3];
                        // Unset 1 index
                        unset($url[3]);
                    }
                }

                // Get params
                $this->params = $url ? array_values($url) : [];

                // Call a callback with array of params
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            } else if(file_exists(CONTROLLERS . $this->currentController . '.php')) {
                $this->currentController = new $this->currentController;

                // var_dump($this->currentController);

                if(method_exists($this->currentController, $this->currentMethod)) {
                    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
                }
            }
        }

        /**
         * @@getUrl fn: Helper function that
         * retrieves the url handed to the server
         */
        public function getUrl() {
            echo 'We are in ' . __CLASS__ . ' under action: ' . __METHOD__ . '<br/>';
            var_dump($_SERVER['REQUEST_URI']);
            if(isset($_SERVER['REQUEST_URI'])) {
                $url = rtrim($_SERVER['REQUEST_URI'], '/');

                // This ensures that the url is only string/number
                $url = filter_var($url, FILTER_SANITIZE_URL);

                // Break up the url into an array
                $url = explode('/', $url);

                return $url;
            }
        }
    }