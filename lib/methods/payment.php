<?php
include_once(__DIR__.'/../utils/db.php');

include_once('auth.php');

class PaymentMethods {
    private DB $db;
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
        $uid = $this->uid;
        $db = $this->db;

        $q1 = "SELECT * FROM `cart` WHERE `uid`=$uid";

        $cart_items = $db->select_all($q1);

        



        return null;
    }

    public function rent_payment($details) {

        [$item_id, $fromDate, $toDate] = $details;

        return null;
        
    }
}

?>