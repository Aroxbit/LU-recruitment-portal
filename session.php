<?php
session_start();
?>

<?php
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    require_once('./database.php');
    
    $result = mysqli_query($dbc,"SELECT * FROM users WHERE email='" . $email . "' and pass = '". $pass."'");
    $count  = mysqli_num_rows($result);
    if($count==0) {
      echo "Wrong Email or Password";
    } else {
        $_SESSION["email"] = $email;
        header("Location: dashboard.php");
        die();
    }
?>