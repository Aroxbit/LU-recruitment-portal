<?php
session_start();
?>

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
    $result = mysqli_query($conn,"SELECT * FROM user WHERE email='" . $_POST["email"] . "' and pass = '". $_POST["pass"]."'");
    $count  = mysqli_num_rows($result);
    if($count==0) {
      echo "Wrong Email or Password";
    } else {
        $_SESSION["email"] = $_POST["email"];
        header("Location: dashboard.php");
        die();
    }
?>