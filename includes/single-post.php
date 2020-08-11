<?php 
require_once'conn.php';
session_start();
if(!isset($_SESSION['email'])) {
  header("location:login.php");
}

//if(isset($_GET['film_id'])) {
	$film_id = $_GET['film_id'];
//}
$conn = mysqli_connect(servername, username, password, dbname);
$sql = "SELECT * FROM film_table WHERE film_id = '$film_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)){
  while($row=mysqli_fetch_assoc($result)) {
    $filmName = $row['filmName'];
    $filmPrice = $row['filmPrice'];
    $filmDetails = $row['filmDetails'];
    $cat_id = $row['cat_id'];
    $subcat_id = $row['subcat_id'];
    $film_id = $row['film_id'];
    $image = $row['image'];
    

  }
}

$sql1 = "SELECT * FROM film_table ORDER BY film_id ASC LIMIT 1";
$result1 = mysqli_query($conn, $sql1);
$count = 0;
if (mysqli_num_rows($result1)>$count){
  while($row=mysqli_fetch_assoc($result1)) {
    $filmName1[] = $row['filmName'];
    $filmPrice1[] = $row['filmPrice'];
    $filmDetails1[] = $row['filmDetails'];
    $cat_id1[] = $row['cat_id'];
    $subcat_id1[] = $row['subcat_id'];
    $film_id1[] = $row['film_id'];
    $image1[] = $row['image'];
    
    $count++;

  }
}

$sql2 = "SELECT * FROM film_table ORDER BY film_id DESC LIMIT 1";
$result2 = mysqli_query($conn, $sql2);
$count2 = 0;
if (mysqli_num_rows($result2)>$count2){
  while($row=mysqli_fetch_assoc($result2)) {
    $filmName2[] = $row['filmName'];
    $filmPrice2[] = $row['filmPrice'];
    $filmDetails2[] = $row['filmDetails'];
    $cat_id2[] = $row['cat_id'];
    $subcat_id2[] = $row['subcat_id'];
    $film_id2[] = $row['film_id'];
    $image2[] = $row['image'];
    //$date_created = date('j, F, Y', strtotime($row['date_created']));
    $count2++;

  }
}
?>