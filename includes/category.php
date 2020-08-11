<?php
require_once('conn.php');

##### Session Start #####
session_start();

if (!isset($_SESSION['username'])) {
	header('Location:login.php');
	exit;
}
##### Session Start #####

##### Database Connection Start #####
$conn = mysqli_connect(servername, username, password, dbname);
##### Database Connection End #####

##### Initialize variables Start #####
$category = "";
$errors = array();
##### Initialize variables End #####


##### Category Start #####
if(isset($_POST['sub-mit'])){
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	if(empty($category)){
		array_push($errors, "Category is Required");
	}
	if(!preg_match("/^[a-zA-Z ]*$/", $category)){
				array_push($errors, "Only letters and white space allowed");
	}
	if(strlen($category)<3){
		array_push($errors, "Category name is too  short");
	}

	//Create a prepared statement
    $stmt =  $conn->prepare("INSERT INTO category (category) VALUES(?)");
    //Bind the parameters to the placeholder
    $stmt->bind_param('s', $category);
    //Execute the statement
    if ($stmt->execute()) {
                echo"<script>alert('Category Created')</script>";
                echo"<script>window.open('index.php', '_self')</script>";
      }
      else {
      			echo"<script>alert('Error in Creating Category')</script>";
      			echo"<script>window.open('category.php', '_self')</script>";
      }
}
##### Category End #####


?>