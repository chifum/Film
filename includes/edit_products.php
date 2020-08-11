<?php
require_once('conn.php');


 $category = array();
######## Select Category Start ########
$category = array();
$sql = "SELECT * FROM category ORDER BY cat_id DESC";
$result = mysqli_query($conn, $sql);
$count = 0;
if(mysqli_num_rows($result)>$count){
  while($row = mysqli_fetch_assoc($result)){
    $cat_id[] = $row['cat_id'];
    $category[] = $row['category'];
    $count++;
  }
}
######## Select Category End ########

######## Select Subcategory Start ########
$sql1 = "SELECT * FROM subcategory ORDER BY subcat_id DESC";
$result1 = mysqli_query($conn, $sql1);
$count1 = 0;
if(mysqli_num_rows($result1)>$count1){
  while($row = mysqli_fetch_assoc($result1)){
    $subcat_id1[] = $row['subcat_id'];
    $subcategory1[] = $row['subcategory'];
    $count1++;
  }
}
######## Select Subcategory End ########

######## Submit Product Start ########
$errors = array();
$conn = mysqli_connect(servername, username, password, dbname);
  if(isset($_POST['submit'])) {
  $film_id = mysqli_real_escape_string($conn, $_POST['film_id']);
  $filmName = mysqli_real_escape_string($conn, $_POST['filmName']);
  $filmPrice = mysqli_real_escape_string($conn, $_POST['filmPrice']);
  $filmDetails = mysqli_real_escape_string($conn, $_POST['filmDetails']);
  $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
  $subcat_id = mysqli_real_escape_string($conn, $_POST['subcat_id']);

  if(empty($filmName)) { array_push($errors, "Film Name Required");}
  if(empty($filmPrice)) { array_push($errors, "Film Price Required");}
  if(empty($filmDetails)) { array_push($errors, "Film Details Required");}
    

    if(count($errors) == 0){
    //Create a prepared statement
    $stmt =  $conn->prepare("UPDATE film_table SET filmName = ?, filmPrice = ?, filmDetails = ?, cat_id = ?, subcat_id = ? WHERE film_id = ?");
    //Bind the parameters to the placeholder
    $stmt->bind_param('sssiii', $filmName, $filmPrice, $filmDetails, $cat_id, $subcat_id, $film_id);
    //Execute the statement
    if ($stmt->execute()) {
                // echo"<script>alert('Film Uploaded, Thanks!')</script>";
                echo"<script>window.open('index.php', '_self')</script>";
      }
      else {
            // echo"<script>alert('Uploading Failed')</script>";
            // echo"<script>window.open('index.php', '_self')</script>";
      }
  }

}

if(isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
    $sql = "SELECT * FROM film_table WHERE film_id = '$film_id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)) {
      $row = mysqli_fetch_assoc($result);
      $film_id = $row['film_id'];
      $filmName = $row['filmName'];
      $filmPrice = $row['filmPrice'];
      $filmDetails = $row['filmDetails'];
      $cat_id = $row['cat_id'];
      $subcat_id = $row['subcat_id'];
  }
}