<?php
require_once'conn.php';
session_start();

$conn = mysqli_connect(servername, username, password, dbname);

$errors = array();
  /*Rgeistration Code Start*/
  if(isset($_POST['submit'])) {
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $addres = mysqli_real_escape_string($conn, $_POST['addres']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


  if(empty($fullName)) { array_push($errors, "Fullname Required");}
  if(empty($email)) { array_push($errors, "Email Required");}
  if(empty($addres)) { array_push($errors, "Address Required");}
  if(empty($dob)) { array_push($errors, "Date of Birth Required");}
  if(empty($phone)) { array_push($errors, "Phone Number Required");}
  if(empty($password)) { array_push($errors, "Password Required");}
  if(empty($cpassword)) { array_push($errors, "Confirm Password Required");}
  if($password !== $cpassword){ array_push($errors, "The two passwords do not match");}


  if(strlen($fullName) < 2) {array_push($errors, "Fullname is too short");}
  if(!preg_match("/^[a-zA-Z ]*$/", $fullName)){ array_push($errors, "Only letters and white space allowed");}
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Invalid Email"); }
  if(!preg_match("/[A-Za-z0-9\-\\,.]+/", $addres)) { array_push($errors, "Street address must be valid");}
  if(preg_match("/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/", $dob)) { array_push($errors, "Invalid Date");}
  //if(!preg_match('/^[0-9]{11}/', $phone)){ array_push($errors, "Only number allowed");}

  $user_check_query = "SELECT * FROM customers WHERE email = ? OR phone = ? LIMIT 1";
    //Create a prepared statement
    $stmt = $conn->prepare($user_check_query);
    //Bind the parameters to the placeholder
    $stmt->bind_param('ss', $email, $phone);
    //Execute the statement
    $stmt->execute();

    $result = $stmt->get_result();
    $user = mysqli_fetch_assoc($result);
    $stmt->close();

    if ($user) { // if user already exists
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }

        if ($user['phone'] === $phone) {
        	array_push($errors, "Phone number already exists");
        }
    }    
    

    if(count($errors) == 0){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);//encrypt the password before saving in the database
    //Create a prepared statement
    $stmt =  $conn->prepare("INSERT INTO customers (fullName, email, addres, dob, gender, phone, password, date_created) VALUES(?,?,?,?,?,?,?,NOW())");
    //Bind the parameters to the placeholder
    $stmt->bind_param('sssssss', $fullName, $email, $addres, $dob, $gender, $phone, $password);
    //Execute the statement
    if ($stmt->execute()) {
                echo"<script>alert('Account have been created successfully, Thanks!')</script>";
                echo"<script>window.open('index.php', '_self')</script>";
      }
      else {
      			echo"<script>alert('Registration Failed')</script>";
      			echo"<script>window.open('login-register.php', '_self')</script>";
      }
  }

}

/*Registration Code End*/


/*Login Code Start*/
    if(isset($_POST['login'])) {
        $email = mysqli_escape_string($conn, $_POST['email']);
        $password = mysqli_escape_string($conn, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if(empty($email)) {array_push($errors, "Email Required");}
        if(empty($password)) {array_push($errors, "Password Required");}

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Invalid Email"); }

    $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ? AND password = ? ");
    $stmt->bind_param('ss', $email, $password); 
    $stmt->execute();  
    $stmt->bind_result($customer_id, $fullName, $email, $addres, $dob, $gender, $phone, $password, $date_created);
    $stmt->store_result();
      if($stmt->fetch()) {
        if(password_verify($password, $hashed_password)) {   
          $_SESSION['email'] = $email; // Initializing Session
          $_SESSION['fullName'] = $fullName;
          $_SESSION['addres'] = $addres;
          $_SESSION['dob'] = $dob;
          $_SESSION['gender'] = $gender;
          $_SESSION['phone'] = $phone;
          $_SESSION['customer_id'] = $customer_id;
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
  
  