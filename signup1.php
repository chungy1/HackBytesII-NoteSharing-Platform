<?php
session_start();

if (isset($_POST['fullname'])) {
  $fullname = $_POST['fullname'];
} else {
  $fullname = '';
}

if (isset($_POST['phone'])) {
  $phone = $_POST['phone'];
} else {
  $phone = '';
}

if (isset($_POST['email'])) {
  $email = $_POST['email'];
} else {
  $email = '';
}

if (isset($_POST['password'])) {
  $password = $_POST['password'];
} else {
  $password = '';
}

// Check if the email is already registered
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo '<script>alert("Email already exists.");</script>';
} else {
  // Insert the user data into the database
  $sql = "INSERT INTO users (fullname, phone, email, password) VALUES ('$fullname', '$phone', '$email', '$password')";
  mysqli_query($conn, $sql);

  // Set the session variables
  $_SESSION['fullname'] = $fullname;
  $_SESSION['email'] = $email;

  // Redirect to the home page
  header('Location: home.php');
}
?>