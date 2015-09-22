<?php

// Analyse data received
$error = false;

// Test all POST data has been received
if ( isset($_POST["username"])
    && isset($_POST["password"])
    && isset($_POST["passwordConfirm"])
) {
    // check password match
    if ( $_POST["password"] == $_POST["passwordConfirm"] ) {
        // save information to disk
        $userinfo = "{$_POST["username"]},{$_POST["password"]};";
        $currentUsers = file_get_contents("users.txt");
        if ($currentUsers !== false) {
            $userinfo = $currentUsers.$userinfo;
        }
        file_put_contents("users.txt", $userinfo);
    } else {
        $error = "Password do not match";
    }
} else {
    $error = "Missing data from request";
}




$pageTitle = "Process User";
$pageSubtitle = "Register User Details";
require("partials/html-head.php");
?>

    <meta name="description" content="Processing Registation Details">

<?php
require("partials/html-page-start.php");
?>
    
    <h2>Registering User</h2>
    
    <?php
    
    if ($error === false) {
        echo "<p>Your details have been registered for username: {$_POST["username"]}</p>";
    } else {
        echo "<p style='color:red'>Error processing request!</p>";
        echo "<p>$error</p>";
    }
    
    ?>
    
        
<?php
require("partials/html-page-end.php");
?>