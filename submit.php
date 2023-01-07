<?php

// Connect to the database
$conn = new mysqli("localhost", "root", "", "wmastudio");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_FILES['resume'])) {
    move_uploaded_file($_FILES["resume"]["tmp_name"], $_FILES["resume"]["name"]);
}
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$resume = $_FILES['resume'];

// Insert data into the database
$sql = "INSERT INTO careers (name, email, resume)
VALUES ('$name', '$email', '$resume')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
