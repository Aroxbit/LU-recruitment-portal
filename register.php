<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "recruitment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$myname = $_POST['fname'];
$myemail = $_POST['email'];
$mypass = $_POST['pass'];

$sql = "INSERT INTO user (name, email, pass)
VALUES ('$fname', '$myemail', '$mypass')";

if ($conn->query($sql) === TRUE) {
    header("Location: signin.php");
    die();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>