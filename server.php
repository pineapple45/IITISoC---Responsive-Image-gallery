<?php
session_start();

// initializing variables
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $pwd = mysqli_real_escape_string($db, $_POST['User_Password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($pwd)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($pwd);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (Email, User_Password) 
  			  VALUES('$email', '$password')";
  	mysqli_query($db, $query);
  	//$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: ../upload/rr.html');
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['Email']);
    $password = mysqli_real_escape_string($db, $_POST['User_Password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE Email='$email' AND User_Password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['Email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: uplaod/rr.html');
        }else {
            array_push($errors, "Wrong e-mail/password combination");
        }
    }
  }
  
  ?>
