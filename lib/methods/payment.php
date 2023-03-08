<?php
include_once(__DIR__.'/../utils/db.php');

include_once('auth.php');

class PaymentMethods {
    private $db;
    private $uid;
    
    function __construct() {
        $this->uid = Auth::currentUser();
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

    public function cart_payment() {
        return null;
    }

    public function rent_payment($details) {
        return null;
        
    }
}

?>