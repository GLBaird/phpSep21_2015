<?php
session_start();

if (!isset($_SESSION["userLoggedIn"]) || $_SESSION["userLoggedIn"] !== true) {
    header("Location: logon.php");
    die();
}