<?php

include_once(__DIR__.'/../utils/db.php');

include_once('auth.php');

class CartMethods {
    private $user;
    private $db;

    function __construct() {
        $this->user = Auth::currentUser();
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

    public function fetch_cart_items() {
        $db = $this->db;
        $uid = $this->user;

        $query = "SELECT * FROM `cart` INNER JOIN `items` on `items`.`item_id`=`cart`.`item_id` WHERE `uid`=$uid";

        return $db->select_all($query);
    }

    public function add_to_cart($item_id) {
        $db = $this->db;
        $uid = $this->user;

        $item_id = mysqli_real_escape_string($db->getCurrentConnection(), $item_id);

        $query = "INSERT INTO `cart`(`uid`, `item_id`) VALUES ($uid, $item_id)";

        return $db->insert($query);
    }
}
?>