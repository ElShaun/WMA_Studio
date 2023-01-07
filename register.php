<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'wmastudio');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

// Insert user data into the database
$sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
