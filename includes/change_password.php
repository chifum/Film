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

      if(isset($_POST['change_password'])) {
        $customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
        $retypePassword = mysqli_real_escape_string($conn, $_POST['retypePassword']);
      
        if(empty($password)) {array_push($errors, "Enter Current Password");}
        if(empty($newPassword)) {array_push($errors, "Enter New Password");}
        if(empty($retypePassword)) {array_push($errors, "Enter Confirm New Password");}
        
      
          $stmt = $conn->prepare("SELECT * FROM customers WHERE customer_id = ? AND password = ? ");
          $stmt->bind_param('is', $customer_id, $password);
          $stmt->execute();
          $result = $stmt->get_result(); 
          $check_pass = $result->fetch_assoc(); 
          
          if($check_pass == 0) {
            echo " <script>alert('Wrong Password!')</script> ";
            echo"  <script>window.open('change_password.php', '_self')</script>";
            exit;
          }
          if($newPassword != $retypePassword) {
              echo "<script>alert('Password do not match!')</script>";
              echo"  <script>window.open('change_password.php', '_self')</script>";
              exit;
          }
          else {
              //$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
              $Stmt = $conn->prepare("UPDATE customers SET password = ? WHERE customer_id = ?");
              $Stmt ->bind_param('si', $newPassword, $customer_id);
              $Stmt->execute();
                echo"  <script>alert('Updated')</script>";
                echo"  <script>window.open('home.php', '_self')</script>";
              }
      
          }

?>      