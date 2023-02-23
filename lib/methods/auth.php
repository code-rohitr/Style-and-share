<?php

include(__DIR__.'/../utils/db.php');

class Auth {
    private function dbconn() {
        try {
            $d = new DB();
            $conn = $d->connect();
        } catch (Exception $e) {
            throw new Exception($e);
        }

        return $d;
    }

    private function authenticate($user) {
        
        return 'connected';
    }

    public static function login() {

    }

    public static function signup() {

    }

    public static function logout() {

    }

    public static function isAuthenticated() {

    }
}

?>