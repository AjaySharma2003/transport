<?php
session_start();
unset($_SESSION["admin_mail"]);
header('location:../admin_login.php');
?>