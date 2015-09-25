<?php
require_once("constants.php");
error_reporting(0); ?>
<nav>
    <ul>        
        <?php if ($_SESSION["userLoggedIn"] === true) { ?>
            <li><a href="users.php">Users</a></li>
            <li><a href="logon.php?logoff=true">Log off</a></li>
        <?php } else {?>
            <li><a href="logon.php">Logon</a></li>
            <li><a href="register.php">Register</a></li>
        <?php } ?>
    </ul>
</nav>
<?php error_reporting(ERROR_REPOT_SETTING); ?>