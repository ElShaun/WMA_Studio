<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'wmastudio');

// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Check if the username and password are valid
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    // Login is successful
    session_start();
    $_SESSION['logged_in'] = true;
    header('Location: home.php');
    exit;
  } else {
    // Login is unsuccessful
    $error_message = 'Invalid username or password';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php if (isset($error_message)) { echo $error_message; } ?>
  <form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
