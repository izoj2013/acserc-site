<?php
class MipValidator {
    public function validateName($name, $hint='') {
        $nameError = '';
        if(empty($name)) {
            $nameError = $hint . ' is required';
        } else {
            if(!preg_match('/^[a-zA-Z0-9\-]+$/', $name)) {
                $nameError = $hint . ' can only contain alphanumeric with an hyphen if applicable';
            }
        }
        return $nameError;
    }

    public function validateEmail($email, $hint='') {
        $emailError = '';
        if(empty($email)) {
            $emailError = $hint . ' is required, cannot be blank';
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = 'Invalid format for email';
            }
        }
        return $emailError;
    }

    public function validateBlankField($field, $hint='') {
        $fieldError = '';
        if(empty($field)) {
            $fieldError = $hint . ' is required, cannot be blank';
        }
        return $fieldError;
    }

    public function validateNumberInput($number, $hint='') {
        $numberError = '';
        if(empty($number)) {
            $numberError = $hint . ' is required, cannot be blank';
        } else {
            if(!filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT)) {
                $numberError = $hint . ' must be a number';
            } 
        }
        return $numberError;
    }

    public function validatePassword($password, $hint='') {
        $passwordError = '';
        $pwdRegex = "/^(.{0,7}|#[^a-zA-Z]+#|#[0-9]+#|#[^\w]+#)$/";
        
        if (empty($password)) {
            $passwordError = 'Please, enter password';
        } elseif(strlen($password) < 8) {
            $passwordError = 'Password must have at least 8 characters!';
        } elseif(preg_match($pwdRegex, $password)) {
            $passwordError = 'Password must be hard to guess!';
        }

        return $passwordError;
    }

    public function checkPwdConfirmation($pwdConfirm, $pwd) {
        $pwdConfirmError = '';
        if(empty($pwdConfirm)) {
            $pwdConfirmError = 'Please, enter password!';
        } elseif($pwdConfirm != $pwd) {
            $pwdConfirmError = 'Passwords do not match, plz, try again!';
        }

        return $pwdConfirmError;
    }
}