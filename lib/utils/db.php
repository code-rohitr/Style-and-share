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

    function connect() {
        $db = $this->dbname;
        $host = $this->dbhost;
        $user = $this->dbuser;
        $pass = $this->dbpassword;

        $conn = mysqli_connect($host, $user, $pass, $db);

        if ($conn) {
            $this->$dbconn = $conn;
            return $conn;
        } else {
            throw new Exception(mysqli_connect_error());
        }
    }

    function getCurrentConnection() {
        return $this->dbconn;
    }

    function select($query, $connection) {
        $c = $connection ? $connection : $this->dbconn;

        $r = mysqli_query($query, $c);

        
    }

    function insert($query, $connection) {

    }

    function update($query, $connection) {

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