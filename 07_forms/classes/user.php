<?php

// User Class
// by Leon Baird

class User {
    var $id;
    var $username;
    var $password;
    var $regDate;
    
    function __construct($id, $username, $regDate, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->regDate = $regDate;
        $this->password = $password;
    }
}
