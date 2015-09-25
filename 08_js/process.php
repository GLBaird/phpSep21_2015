<?php

if ( isset($_POST['username']) && isset($_POST["password"]) ) {
    
    $data = "We have just received {$_POST['username']} and password: {$_POST['password']}";
    file_put_contents("data.txt", $data);
    
    echo "success";
} else {
    echo "There has been some sort of evil error!";
}