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
$subcat = "";
$errors = array();
##### Initialize variables End #####

##### Sub Category Start #####
if(isset($_POST['submit'])){
	$subcategory = mysqli_real_escape_string($conn, $_POST['subcategory']);
	if(empty($subcategory)){
		array_push($errors, "Sub-category is Required");
	}
	if(!preg_match("/^[a-zA-Z ]*$/", $subcategory)){
				array_push($errors, "Only letters and white space allowed");
	}
	if(strlen($subcategory)<3){
		array_push($errors, "Sub-category name is too  short");
	}

	//Create a prepared statement
    $stmt =  $conn->prepare("INSERT INTO subcategory (subcategory) VALUES(?)");
    //Bind the parameters to the placeholder
    $stmt->bind_param('s', $subcategory);
    //Execute the statement
    if ($stmt->execute()) {
                echo"<script>alert('Subcategory Created')</script>";
                echo"<script>window.open('index.php', '_self')</script>";
      }
      else {
      			echo"<script>alert('Error in Creating Subcategory')</script>";
      			echo"<script>window.open('subcategory.php', '_self')</script>";
      }

	// $insert = mysqli_query($conn, "INSERT INTO subcategory (subcategory) VALUES('$subcategory')") or die("could not insert " . mysqli_error($conn));
	// if($insert){
	// 	array_push($errors, "Sub Category Uploaded");
	// }
	// else{
	// 	array_push($errors, "Error in Uploading");
	// }
}
##### Sub Category End #####
?>