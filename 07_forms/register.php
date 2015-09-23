<?php
$pageTitle = "User Information Form";
$pageSubtitle = "Register User Details";

require("partials/html-head.php");
?>

    <meta name="description" content="Form to collect registration details">

<?php
require("partials/html-page-start.php");
?>

    <h2>Registration form</h2>
    <p>Please complete the following form:</p>
    
    <form method="post" action="process-register.php">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
        </p>
        <p>
            <label for="password">Account password:</label>
            <input type="password" name="password" required>
            <input type="password" name="passwordConfirm" placeholder="Confirm password" required>
        </p>
        <p>
            <input type="reset" value="Clear form">
            <input type="submit" value="Submit form">
        </p>
    </form>
        
<?php
require("partials/html-page-end.php");
?>
