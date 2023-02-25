<?php

class DB {
    private $dbname;
    private $dbhost;
    private $dbuser;
    private $dbpassword;
    private $dbconn;

    function __construct() {
        $this->dbname = 'style_n_share';
        $this->dbhost = 'localhost';
        $this->dbuser = 'style_n_share';
        $this->dbpassword = 'style_n_share';
    }

    public function connect() {
        $db = $this->dbname;
        $host = $this->dbhost;
        $user = $this->dbuser;
        $pass = $this->dbpassword;

        $conn = mysqli_connect($host, $user, $pass, $db);

        if ($conn) {
            $this->dbconn = $conn;
            return $conn;
        } else {
            throw new Exception(mysqli_connect_error());
        }
    }

    public function getCurrentConnection() {
        return $this->dbconn;
    }

    public function clean_str($string, $connection=null) {
        $c = $connection ?? $this->dbconn;
        return mysqli_escape_string($c ,$string);
    }

    public function select($query, $connection=null) {
        $c = $connection ?? $this->dbconn;

        $r = mysqli_query($c, $query);

        $e = mysqli_error($c);

        if ($e) {
            throw new Exception($e);
        }

        return $r->fetch_all();
    }

    // public function select_one($query, $connection) {
    //     $c = $connection ?? $this->dbconn;

    //     $r = mysqli_query($c, $query);

    //     return $r->fetch();
    // }

    public function insert($query, $connection=null) {
        $c = $connection ?? $this->dbconn;

        $r = mysqli_query($c, $query);

        return $r;
    }

    function insert_and_return($query, $connection=null) {
        $c = $connection ?? $this->dbconn;
        $r = mysqli_query($c, $query);
    }

    function update($query, $connection=null) {
        $c = $connection ?? $this->dbconn;
        $r = mysqli_query($c, $query);
    }

    function update_and_return($query, $connection=null) {
        $c = $connection ?? $this->dbconn;
        $r = mysqli_query($c, $query);
    }

    function close() {
        $conn = $this->dbconn;

        $closed = mysqli_close($conn);

        if (!$closed) {
            throw new Exception('Error while closing database session.');
        }
    }
}

?>