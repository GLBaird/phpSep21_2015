<?php

// PHP Database Controller
// by Leon Baird

require_once("constants.php");
require_once("user.php");

class DatabaseController {
    private $connection;
    var $dbError;
    
    function __construct() {
        $server = DB_HOST.":".DB_PORT; 
        $this->connection = new mysqli($server, DB_USER, DB_PASSWORD, DB_NAME);
        if ($this->connection->connect_error) {
            $this->dbError = "Cannot connect to Database";
        } else {
            $this->createUserTable();
        }
    }
    
    function __destruct() {
        $this->connection->close();
    } 
    
    private function createUserTable() {        
        $query = "CREATE TABLE IF NOT EXISTS users (
        `id` INT(6) NOT NULL AUTO_INCREMENT,
        `username` VARCHAR(50) NOT NULL,
        `password` VARCHAR(50) NOT NULL,
        `reg_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE `username` (`username`)
        )";
        
        if ($this->connection->query($query) === false) {
            $this->dbError = "Failed to make table users. ".$this->connection->error;
        }
        
    }
    
    function addUser($username, $password) {
        if ($this->checkUserExisits($username)) {
            $this->dbError = "User already exists";
            return false;
        }
        $encryptedPassword = $this->encryptPassword($password);
        
        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("ss", $username, $encryptedPassword);
        $statement->execute();
        
        return true;
    }
    
    function getAllUsers() {
        $query = "SELECT * FROM users ORDER BY username ASC";
        $results = $this->connection->query($query);
        $users = array();
        while ($row = $results->fetch_assoc()) {
            $users[] = new User($row["id"], $row["username"], $row["reg_date"], $row["password"]);
        }
        return $users;
    }
    
    function logUserIn($username, $passsword) {
        $user = $this->getUser($username);
        if ($user === false) {
            return false;
        }
        if (!$this->comparePassword($passsword, $user->password)) {
            $this->dbError = "Password is not correct";
            return false;
        }
        
        $_SESSION["userLoggedIn"] = true;
        return true;
    }
    
    function getUser($username) {
        $query = "SELECT * FROM users WHERE username='$username'";
        $results = $this->connection->query($query);
        if ($results->num_rows == 0) {
            $this->dbError = "User does not exists";
            return false;
        }
        $row = $results->fetch_assoc();
        return new User($row["id"], $row["username"], $row["reg_date"], $row["password"]);
    }
    
    private function checkUserExisits($username) {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $results = $this->connection->query($query);
        
        return $results->num_rows > 0;
    }
    
    private function encryptPassword($password) {
        return crypt($password, ENCRYPTION_SALT);
    }
    
    private function comparePassword($password, $encryptedPassword) {
        $passwordTest = $this->encryptPassword($password);
        return hash_equals($encryptedPassword, $passwordTest);
    }
}

