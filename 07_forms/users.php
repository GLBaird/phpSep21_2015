<?php
require("partials/secure-page.php");

$pageTitle = "User List";
$pageSubtitle = "Registered Users";

require_once("classes/database-controller.php");
$db = new DatabaseController();
$users = $db->getAllUsers();

require("partials/html-head.php");
?>

    <meta name="description" content="View all registered users on the system.">

<?php
require("partials/html-page-start.php");
?>
    
    <h2>List of current users</h2>
    <p>The following users have registered with the system:</p>
    
    <table class="users">
        <thead>
            <tr>
                <th style="width: 5em;">User ID</th>
                <th>Username</th>
                <th>Registration Date</th>
            </tr>            
        </thead>
        <tbody>
            <?php
            foreach($users as $user) {
                echo "<tr>";
                echo "<td>".$user->id."</td>";
                echo "<td>".$user->username."</td>";
                echo "<td>".$user->regDate."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
        
<?php
require("partials/html-page-end.php");
?>