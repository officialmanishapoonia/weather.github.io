<?php
$servername = "localhost:3307";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password,"weather");
// Check connection
if (!$conn) {
  header("Location: ../errors/db.php");
  die("Connection failed: " . mysqli_connect_error());
}


// Create database
// $sql = "CREATE DATABASE cms";
// if (mysqli_query($conn, $sql)) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . mysqli_error($conn);
// }

// mysqli_close($conn);

?>