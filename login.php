<?php
session_start();

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

// Check if the email and password are valid
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
  echo '<script>alert("Invalid email or password.");</script>';
} else {
  // Set the session variables
  $_SESSION['fullname'] = $fullname;
  $_SESSION['email'] = $email;

  // Redirect to the home page
  /* header('Location: home.php'); */
  header('Location: index.html');
}
?>
