<?php
require_once'conn.php';
session_start();
/*Login Code Start*/
$errors = array();
$conn = mysqli_connect(servername, username, password, dbname);
    if(isset($_POST['login'])) {
        $username = mysqli_escape_string($conn, $_POST['username']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(empty($username)) {array_push($errors, "Username Required");}
        if(empty($password)) {array_push($errors, "Password Required");}


    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ? ");
    $stmt->bind_param('ss', $username, $password); 
    $stmt->execute();  
    $stmt->bind_result($admin_id, $username, $password);
    $stmt->store_result();
      if($stmt->fetch()) {
        if(password_verify($password, $hashed_password)) {   
          $_SESSION['username'] = $username; // Initializing Session
          header("Location: index.php"); // Redirecting To Other Page
          exit;
        }
     }

     else {
          array_push($errors, "Email or Password is incorrect");
     }
        mysqli_close($conn); // Closing Connection
}
        
/*Login Code End*/
?>