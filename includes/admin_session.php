<?php
require_once'conn.php';
session_start();
if(!isset($_SESSION['username'])) {
  header("location: login.php");
}
$conn = mysqli_connect(servername, username, password, dbname);
?>