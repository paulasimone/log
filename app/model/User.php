<?php

namespace App\Model;

use \App\Model\Database;

class User {

    private $conn;
    private $table = "users";
    private $id;
    private $name;
    private $email;
    private $birthday;
    private $gender;
    
    public $user = [];

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $this->conn->real_escape_string($value);
        }
    }

    public function CreateUser() {

        $query = "INSERT INTO `". $this->table ."` (`name`, `email`, `birthday`, `gender`) 
        VALUES ('". $this->name ."', '". $this->email ."', '". $this->birthday ."', '". $this->gender ."')";

        return $this->conn->query($query);
    }

    public function ListUsers() {

        $query = "SELECT * FROM `". $this->table ."`";
        $res = $this->conn->query($query);

        return $res;
    }

    public function DeleteUser() {
        $query = "DELETE FROM `". $this->table ."` WHERE `id` = ". $this->id;

        return $this->conn->query($query);
    }

    public function UpdateUser() {

        $query = "UPDATE `". $this->table ."` SET 
        `name` = '". $this->name ."', 
        `email` = '". $this->email ."', 
        `birthday` = '". $this->birthday ."', 
        `gender` = '". $this->gender ."' 
        WHERE `id` = ". $this->id;
     
        return $this->conn->query($query);
    }

    public function ViewUser() {

        $query = "SELECT * FROM `". $this->table ."` WHERE `id` = ". $this->id;

        $res = $this->conn->query($query);

        return $res;
    }
}