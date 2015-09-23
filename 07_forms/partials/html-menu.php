<?php error_reporting(0); ?>
<nav>
    <ul>        
        <?php if ($_SESSION["userLoggedIn"] === true) { ?>
            <li><a href="users.php">Users</a></li>
            <li><a href="add.php">Add address</a></li>
            <li><a href="view.php">View addresses</a></li>
            <li><a href="logoff.php">Log off</a></li>
        <?php } else {?>
            <li><a href="logon.php">Logon</a></li>
            <li><a href="register.php">Register</a></li>
        <?php } ?>
    </ul>
</nav>
<?php error_reporting(E_ALL); ?>