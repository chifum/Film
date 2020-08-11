<?php
    require_once'conn.php';
    if(!isset($_SESSION)) {
        session_start();
     }

     $conn = mysqli_connect(servername, username, password, dbname);
     
     if(!isset($_SESSION['email'])) {
        header("location:login.php");
      }
$errors = array();
 
 if(isset($_SESSION['customer_id'])) {
      $customer_id = $_SESSION['customer_id'];
    $getCustomer = "SELECT * FROM customers WHERE customer_id = '$customer_id'";
    $getCustomerRes = mysqli_query($conn, $getCustomer);
    $row = mysqli_fetch_assoc($getCustomerRes);
    $customer_id = $row['customer_id'];
    }   
    
$sql = "SELECT * FROM film_order WHERE customer_id = '$customer_id'";   
$result = mysqli_query($conn, $sql);
$count = 0;
if(mysqli_num_rows($result)>$count) {
       while($row_order = mysqli_fetch_assoc($result)) {
         //$order_id = $row_order['order_id'];
         $filmPrice[] = $row_order['filmPrice'];
         $filmName[] = $row_order['filmName'];
         $film_id[] = $row_order['film_id'];
         $count++;
         }
       }
?>      