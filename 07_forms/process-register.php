<?php
// load db controller for adding user
require_once("classes/database-controller.php");

// Analyse data received
$error = false;

// open database
$db = new DatabaseController();
if ($db->dbError) {
    $error = $db->dbError;
} else {
    // Test all POST data has been received
    if ( isset($_POST["username"])
        && isset($_POST["password"])
        && isset($_POST["passwordConfirm"])
    ) {
        // check password match
        if ( $_POST["password"] == $_POST["passwordConfirm"] ) {
            // save information to database
            if (!$db->addUser($_POST["username"], $_POST["password"])) {
                $error = "Error adding user.<br>".$db->dbError;
            } else {
                // see if image exists and save
                if ( isset($_FILES["avatar"]) && strpos( $_FILES["avatar"]["type"], "image") !== false ) {
                    if( !file_exists("uploads") ) {
                        mkdir("uploads");
                    }
                    $filename = "uploads/".$_POST['username'];
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], $filename);
                }
            }
            
        } else {
            $error = "Password do not match";
        }
    } else {
        $error = "Missing data from request";
    }
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