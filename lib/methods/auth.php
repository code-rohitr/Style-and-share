<?php

include(__DIR__.'/../utils/db.php');

session_start();
class Auth {
    private $db;
    function __construct() {
        $this->db = $this->dbconn();
    }
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
        if ($user) {
            $id = $user->aid ? $user->aid : $user->uid;

            $_SESSION['user'] = $id;
        }
    }

    public function loginAdmin($data) {
        $pass = $data->password;
        $email = $data->email;
    }

    public function loginUser($data) {
        $pass = $data->password;
        $email = $data->email;
    }

    public function signupUser($data) {
        $pass = $data->password;
        $email = $data->email;
        $contact = $data->contact;
        $name = $data->name;
        $username = $data->username;

    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function currentUser() {
        return $_SESSION['user'];
    }

    public static function redirectToLogin($url, $statusCode=303) {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET['logout']) {
        Auth::logout();
    }
}

?>