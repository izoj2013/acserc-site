<?php
class HorseWork {
    /**
     * Utility function to sanitise user input
     */
    public function clean_input($data) {
        $output = trim($data);
        $output = stripslashes($output);
        $output = htmlspecialchars($output);
        $output = strip_tags($output);

        return $output;
    }

    /**
     * Utility function to display a formatted alert message
     */
    public function show_message($type, $msg) {
        return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                    <strong>' . $msg . '</strong> You should check in on some of those fields below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }

    /**
     * Utility function to streamline the redirect
     * with an explanatory message
     */
    public function redirect($page, $data=[], $message= NULL, $message_type = NULL ) {
        if(is_string($page)) {
            $location = $page;
        } else {
            $location = $_SERVER['SCRIPT_NAME'];
        }
    
        // Check 4 Messagee
        if($message != NULL) {
            // Set message
            $_SESSION['message'] = $message;
        }
    
        // Check 4 Message Type
        if($message_type != NULL) {
            // Set message type
            $_SESSION['message_type'] = $message_type;
        }
    
        // Can now redirect
        header('Location: '.$location);
        exit;
    }

    /**
     * Utility function to display a message
     * with its type, from current session
     */
    public function display_message() {
        if(!empty($_SESSION['message'])) {
            // Assign message variable
            $message = $_SESSION['message'];
    
            if(!empty($_SESSION['message_type'])) {
                // Assign message type variable
                $message_type = $_SESSION['message_type'];
    
                // Create output
                if($message_type == 'error') {
                    echo '<div class="alert alert-danger">' . $message . '</div>';
                } else {
                    echo '<div class="alert alert-success">' . $message . '</div>';
                }
            }
            // Unset message attributes
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    }


    /**
     * Utility function to make a current date
     */
    public function get_current_datetime() {
        // Get local timezone
        $local_tmz = date_default_timezone_get();
    
        // Set local tmz as your default tmz
        date_default_timezone_set($local_tmz);
    
        $date_time_now = date("Y-m-d H:i:s");
    
        return $date_time_now;
    }
    
    /**
     * Utility function produce a future date
     */
    public function get_future_date(int $day, 
                                    int $month = 0, 
                                    int $year = 0) {
        $future_date = mktime(0, 0, 0,
                                date("d")+$day,
                                date("m")+$month,
                                date("Y")+$year);
    
        return $future_date;
    }

    /**
     * Utility function to check if user is logged in
     */
    public function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Utility function to help a controller
     * to make a view and render it
     */
    public function make_view($controller, $handler, $view_path, $data=[], $pageName='', $msg='') {
        if($controller != null && (!empty($view_path))) {
            $controller->view($view_path, $data, $msg);
            $controller->$handler->render();
        }
    }
}