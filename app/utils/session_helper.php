<?php
    session_start();

    function isLoggedIn() {
        if(isset($_SESSION['admin_id'])) {
            return true;
        } else {
            return false;
        }
    }