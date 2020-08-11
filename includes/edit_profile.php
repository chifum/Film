<?php
require_once'conn.php';
session_start();
if(!isset($_SESSION['email'])) {
  header("location:login.php");
}

$conn = mysqli_connect(servername, username, password, dbname);

$errors = array();
  if(isset($_POST['update'])) {

  $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $addres = mysqli_real_escape_string($conn, $_POST['addres']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);


  if(empty($fullName)) { array_push($errors, "Fullname Required");}
  if(empty($email)) { array_push($errors, "Email Required");}
  if(empty($addres)) { array_push($errors, "Address Required");}
  if(empty($dob)) { array_push($errors, "Date of Birth Required");}
  if(empty($phone)) { array_push($errors, "Phone Number Required");}


  if(strlen($fullName) < 2) {array_push($errors, "Fullname is too short");}
  if(!preg_match("/^[a-zA-Z ]*$/", $fullName)){ array_push($errors, "Only letters and white space allowed");}
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Invalid Email"); }
  if(!preg_match("/[A-Za-z0-9\-\\,.]+/", $addres)) { array_push($errors, "Street address must be valid");}
  if(preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/", $dob)) { array_push($errors, "Invalid Date");}

    //Create a prepared statement
    $stmt =  $conn->prepare("UPDATE customers SET fullName = ?, email = ?, addres = ?, dob = ?, gender = ?, phone = ? WHERE customer_id = ? ");
    //Bind the parameters to the placeholder
    $stmt->bind_param('ssssssi', $fullName, $email, $addres, $dob, $gender, $phone, $customer_id);
    //Execute the statement
    if ($stmt->execute()) {
                echo"<script>alert('Account Updated successfully')</script>";
                echo"<script>window.open('index.php', '_self')</script>";
      }
      else {
      			array_push($errors, "Update Failed " .mysqli_error($conn));
      			echo"<script>window.open('edit_profile.php', '_self')</script>";
      }
}

if(isset($_SESSION['customer_id'])) {
        $customer_id = $_SESSION['customer_id'];
        $sql = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)) {
          $row = mysqli_fetch_assoc($result);
          $customer_id = $row['customer_id'];
          $fullName = $row['fullName'];
          $email = $row['email'];
          $addres = $row['addres'];
          $dob = $row['dob'];
          $gender = $row['gender'];
          $phone = $row['phone'];
        }
      }
?>      