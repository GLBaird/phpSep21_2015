<?php
$pageTitle = "Logon";
$pageSubtitle = "User control";
require("partials/html-head.php");
require_once("classes/database-controller.php");

if ( isset($_GET["logoff"]) && $_GET["logoff"] == "true" ) {
    $_SESSION["userLoggedIn"] = false;
}


$logon = true;
$valid = "";
if ( isset($_POST["username"]) && isset($_POST["password"]) ) {
    
    $db = new DatabaseController();
    if ( $db->logUserIn($_POST["username"], $_POST["password"]) ) {
        $valid = "You are now logged in!";
        $logon = false;
    } else {
        $valid = $db->dbError;
    }
    
}



?>

    <meta name="description" content="Logon to address pro">

<?php
require("partials/html-page-start.php");

if ($logon) {
?>
    
    <h2>Logon to Address Pro</h2>
    
    <p>Please enter your details:</p>
    
    <form method="post" class="logon">
        <fieldset>
            <legend>User Details</legend>
            
            <p style="color:red;">
                <?php echo $valid; ?>
            </p>
            
            <input type="text" name="username" placeholder="User Name" <?php if( isset($_POST["username"]) ) echo "value='{$_POST["username"]}'";  ?> required>
            <input type="password" name="password" placeholder="Password" required>
            
            <p style="text-align: right;">
                <input type="reset" value="Clear">
                <input type="submit" value="Logon">
            </p>
        </fieldset>
    </form>       
<?php
} else { ?>
    
    <h2>Logon Status</h2>
    
    <p><?php echo $valid; ?></p>


<?php
}
require("partials/html-page-end.php");
?>