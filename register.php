<?php
// $servername = "localhost";
// $username = "root";
// $password = "123";
// $dbname = "recruitment";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }



$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$pass = $_POST['pass'];

require_once('./database.php');

$sql = "INSERT INTO users (email, first_name, last_name, phone, gender, dob, pass)
VALUES ('$email', '$first_name', '$last_name', '$phone', '$gender', '$dob', '$pass')";

if ($dbc->query($sql) === TRUE) {
    header("Location: signin.php");
    die();
} else {
  echo "Error: " . $sql . "<br>" . $dbc->error;
}

// $dbc->close();
?>