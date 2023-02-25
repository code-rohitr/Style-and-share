<?php

include(__DIR__.'/../utils/db.php');

session_start();
// $_SESSION['user'] = 10;
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

    private function hashPassword($pass) {
        return md5(base64_encode($pass));
    }

    private function isCorrectPassword($password, $hash) {
        return $hash == $this->hashPassword($password);
    }

    private function authenticate($user) {
        if ($user) {
            $id = $user['aid'] ? $user['aid'] : $user['uid'];

            $_SESSION['user'] = $id;
            return true;
        } else {
            return false;
        }
    }

    public function loginAdmin($data) {
        $db = $this->db;

        $pass = $db->clean_str($data['password']);
        $email = $db->clean_str($data['email']);


        $q = "SELECT * FROM `admin` WHERE `email`='$email'";

        $r = $db->select($q);

        if ($r) {
            if ($this->isCorrectPassword($pass, $r['password'])) {
                return $this->authenticate($r);
            } else {
                throw new Exception('Wrong credentials.');
            }
        } else {
            throw new Exception('No user with the given email.');
        }
    }

    public function signupAdmin($data) {
        $db = $this->db;

        $pass = $db->clean_str($data['password']);
        $email = $db->clean_str($data['email']);
        $name = $db->clean_str($data['name']);


        $q = "SELECT * FROM `admin` WHERE `email`='$email'";

        $r = $db->select($q);

        if (!$r) {
            $hashed = $this->hashPassword($pass);

            $create_query = "INSERT INTO `admin` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashed')";

            $created = $db->insert($create_query);

            if ($created) {
                return $this->authenticate($r);
            } else {
                throw new Exception('An unknown error occurred.');
            }
        } else {
            throw new Exception('User already exists with this email.');
        }
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