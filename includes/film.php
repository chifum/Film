<?php
require_once'conn.php';
session_start();
if(!isset($_SESSION['email'])) {
  header("location:login-register.php");
}

$conn = mysqli_connect(servername, username, password, dbname);

$sql = "SELECT * FROM film_table WHERE cat_id= 2 ORDER BY film_id DESC LIMIT 3";
$result = mysqli_query($conn, $sql);
$count = 0;
if (mysqli_num_rows($result)>$count){
  while($row=mysqli_fetch_assoc($result)) {
    $filmName[] = $row['filmName'];
    $filmPrice[] = $row['filmPrice'];
    $filmDetails[] = $row['filmDetails'];
    $cat_id[] = $row['cat_id'];
    $subcat_id[] = $row['subcat_id'];
    $film_id[] = $row['film_id'];
    $image[] = $row['image'];
    
    $count++;

  }
}


$sql1 = "SELECT * FROM film_table  WHERE cat_id = 3 ORDER BY film_id DESC ";
$result1 = mysqli_query($conn, $sql1);
$count1 = 0;
if (mysqli_num_rows($result1)>$count1){
  while($row=mysqli_fetch_assoc($result1)) {
    $filmName1[] = $row['filmName'];
    $filmPrice1[] = $row['filmPrice'];
    $filmDetails1[] = $row['filmDetails'];
    $cat_id1[] = $row['cat_id'];
    $subcat_id1[] = $row['subcat_id'];
    $film_id1[] = $row['film_id'];
    $image1[] = $row['image'];
    
    $count1++;

  }
}
?>