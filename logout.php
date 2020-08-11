<?php
session_start();
require_once'includes/conn.php';
$conn = mysqli_connect(servername, username, password, dbname);
if(session_destroy()) {
    unset($_SESSION['email']);
    header("location:login-register.php");
}