<?php
require'../includes/conn.php';

session_start();

if (!isset($_SESSION['username'])) {
	header('Location:login.php');
}

$conn = mysqli_connect(servername, username, password, dbname);

$errors = array();

$film_id = $_GET["film_id"];
if(isset($_POST['submit'])){
	$image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
	$f = '../upload/'.$image;
	$g = move_uploaded_file($_FILES['image']['tmp_name'], $f);

	//Check file size
    if ($_FILES["image"]["size"] > 500000) {
      array_push($errors, "Sorry, your file is too large.");
      $uploadOk = 0;
    }
	
	if(count($errors) == 0){
    //Create a prepared statement
    $stmt =  $conn->prepare("UPDATE  film_table SET image = ? WHERE film_id = ?");
    //Bind the parameters to the placeholder
    $stmt->bind_param('si', $image, $film_id);
    //Execute the statement
    if ($stmt->execute()) {
                echo"<script>alert('Film Update, Thanks!')</script>";
                echo"<script>window.open('manage_products.php', '_self')</script>";
      }
      else {
      			array_push($errors, "Error Occur Updating Film");
      }
  }

}

?>