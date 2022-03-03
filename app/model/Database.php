<?php

namespace App\Model;

class Database {
    private $host = 'localhost';
    private $db_name = 'log';
    private $username = 'root';
    private $password = '';

    public $conn;

    public function __construct() {

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {

            $this->conn = mysqli_connect($this->host ,$this->username,$this->password,"");
            mysqli_select_db($this->conn,$this->db_name);

        } catch(\mysqli_sql_exception $e) {
            throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
        }
        
    }
}   