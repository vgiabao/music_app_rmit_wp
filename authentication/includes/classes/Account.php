<?php

class  Account
{
    public $errorArray;

    public function __construct()
    {
        $this->errorArray = array();
    }

    public function register($userName, $name, $email, $phone, $pw1, $pw2)
    {
        $this->validateUserName($userName);
        $this->validateName($name);
        $this->validateEmail($email);
        $this->validatePhoneNumber($phone);
        $this->validatePassword($pw1, $pw2);

        if (empty($this->errorArray)) {
            //TODO: insert to the db;
            return true;
        }
        return false;
    }

    public function getErrors($error)
    {
        if (!in_array($error, $this->errorArray)) {
            return '';
        }
        echo "<span class='error'> $error </span>";
    }

    public function validateRegister()
    {
        if (!empty($this->errorArray)) {
            return false;
        }
        return true;
    }

    private function validateUserName($usn)
    {
        if (strlen($usn) > 12 || strlen($usn) < 3) {
            array_push($this->errorArray, "Your user name should be between 3 and 12 letters");
            return;
        }
        //TODO: check user name is existing
    }

    private function validatePhoneNumber($phoneNumber)
    {
        return false;
    }

    private function validateName($name)
    {
        if (strlen($name) > 20 || strlen($name) < 1) {
            array_push($this->errorArray, "Your full name should be between 1 and 20 letters");
            return;
        }
    }

    private function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, "Your email is invalid");
            return;
        }
    }

    private function validatePassword($pw1, $pw2)
    {
        if (strlen($pw1) > 20 || strlen($pw1) < 5) {
            array_push($this->errorArray, "Your password must be in 5 and 20 characters");
            return;
        }

        if ($pw1 !== $pw2) {
            array_push($this->errorArray, "Your passwords do not match");
            return;
        }

    }


}