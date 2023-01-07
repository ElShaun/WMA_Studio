<?php
  // Connect to the database
  $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "wmastudio";
  $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  // Get the form data
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  
  // Insert the data into the database
  $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  // Close the connection
  mysqli_close($conn);
?>
