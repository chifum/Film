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
  $filmName = mysqli_real_escape_string($conn, $_POST['filmName']);
  $filmPrice = mysqli_real_escape_string($conn, $_POST['filmPrice']);
  $filmDetails = mysqli_real_escape_string($conn, $_POST['filmDetails']);
  $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
  $subcat_id = mysqli_real_escape_string($conn, $_POST['subcat_id']);
  $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
  $f = '../upload/'.$image;
  $g = move_uploaded_file($_FILES['image']['tmp_name'], $f);

    //Check file size
    if ($_FILES["image"]["size"] > 500000) {
      array_push($errors, "Sorry, your file is too large.");
      $uploadOk = 0;
    }
  
  if(empty($filmName)) { array_push($errors, "Film Name Required");}
  if(empty($filmPrice)) { array_push($errors, "Film Price Required");}
  if(empty($filmDetails)) { array_push($errors, "Film Details Required");}
    

    if(count($errors) == 0){
    //Create a prepared statement
    $stmt =  $conn->prepare("INSERT INTO film_table (image, filmName, filmPrice, filmDetails, cat_id, subcat_id, date_created) VALUES(?,?,?,?,?,?,NOW())");
    //Bind the parameters to the placeholder
    $stmt->bind_param('ssssii', $image, $filmName, $filmPrice, $filmDetails, $cat_id, $subcat_id);
    //Execute the statement
    if ($stmt->execute()) {
                echo"<script>alert('Film Uploaded, Thanks!')</script>";
                echo"<script>window.open('index.php', '_self')</script>";
      }
      else {
      			echo"<script>alert('Uploading Failed')</script>";
      			echo"<script>window.open('index.php', '_self')</script>";
      }
  }

}

######## Total Number of sales ########

$sql = "SELECT * FROM film_order";   
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)) {
 while($row_order = mysqli_fetch_assoc($result)) {
   $order_id = $row_order['order_id'];
   }
 }

 $sql1 = "SELECT * FROM film_order WHERE order_date BETWEEN '2020-08-10'  AND '2020-08-31'";
 $result1 = mysqli_query($conn, $sql1);
 if(mysqli_num_rows($result1)) {
 while($row_order1 = mysqli_fetch_assoc($result1)) {
   $order_id1 = $row_order1['order_id'];
   $filmPrice = $row_order1['filmPrice'];
   }
 }
 $monthly_sales = $order_id1 * $filmPrice;
?>