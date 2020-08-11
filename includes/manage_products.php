<?php
require_once'conn.php';
session_start();
if(!isset($_SESSION['username'])) {
  header("location:login.php");
}

$conn = mysqli_connect(servername, username, password, dbname);

if(isset ($_GET['film_id'])) {
	$film_id = $_GET['film_id'];
	$del = "DELETE FROM film_table WHERE film_id = '$film_id'";
	$remove = mysqli_query ($conn, $del);
	if($remove) {
	        echo"<script>window.open('manage_products.php', '_self')</script>";
        } 
     else {
          echo"<script>window.open('manage_products.php', '_self')</script>";
        }
}
			
$sql = "SELECT * FROM film_table ORDER BY film_id DESC";
$result = mysqli_query($conn, $sql);
$count=0;
if (mysqli_num_rows($result)>$count){
	while($row=mysqli_fetch_assoc($result)) {
	$film_id[]= $row["film_id"];	
	$filmName[]= $row["filmName"];
	$count++;
	}
}
$sn=1;
?>