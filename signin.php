<?php
session_start();
require_once('./database.php');


$mesg = "";
if(isset($_POST["email"]) && isset($_POST["pass"])){
  $email = $_POST["email"];
  $pass = $_POST["pass"];
  $result = mysqli_query($dbc,"SELECT * FROM users WHERE email='" . $email . "' and pass = '". $pass."'");
  $count  = mysqli_num_rows($result);
  $the_user = mysqli_fetch_assoc($result);
  if($count==0) {
    $mesg = "Wrong Email or Password";
  }
  else if(!$the_user["verified"]){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') $link = "https"; 
    else $link = "http"; 
    $link .= "://"; 
    $link .= $_SERVER['HTTP_HOST']; 
    $link .= $_SERVER['REQUEST_URI']; 
    $link .= "?verify=";
    $link .= $the_user["v_id"];
    echo $link;

    $_mail_to = $_POST["email"];
    $_mail_subject = "Verify Your Account";
    $_mail_body = "<h1>Lucknow Recruitment Account Verification</h1><p>To verify your account in the Lucknow University Recruitment, <a href='". $link ."'>click here</a>.</p><p>If you can't click the link, copy and and paste it: ". $link ."</p>";
    require_once('./mail.php');
    $mesg = "Please Check Your Email & Verify Your Account to Signin. If you can't find it in your inbox, check your spam folder.";
  } 
  else {
      $_SESSION["email"] = $email;
      header("Location: dashboard.php");
  }
}

if(isset($_GET["logout"])){
  session_destroy();
}

if(isset($_GET["verify"])){
  $v_id = $_GET["verify"];
  $_result = mysqli_query($dbc,"SELECT * FROM users WHERE v_id='" . $v_id . "'");
  $_count  = mysqli_num_rows($_result);
  $_the_user = mysqli_fetch_assoc($_result);
  if($_count==0) {
    $mesg = "Can't find the account";
    die();
  }
  $sql = "UPDATE users SET verified=true WHERE v_id='$v_id'";
  createRow($sql);
  // $_SESSION["email"] = $_the_user["email"];
  // header("Location: dashboard.php");
  $mesg = "Your email is verified. Please Signin to Continue.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="./src/main.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <title>Lucknow University Recruitment Portal</title>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-light border-bottom">
    <a href="./index.php" class="navbar-brand">
      <!-- Desktop Logo-->
      <img class="d-none d-md-block" src="./assets/logo.png" alt="Logo" width="300" />

      <!-- Mobile Logo -->
      <img class="d-sm-block d-md-none" src="./assets/LU_Logo.png" alt="Lucknow University Logo" width="100" />
    </a>

    <div class="inline-flex">
      <a href="./register.php" class="btn btn-primary">Register</a>
      <a href="./signin.php" class="btn btn-info">Sign In</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="content pb-3">
      <!-- Heading -->
      <h4 class="text-center mt-3 color-green">Sign In</h4>

      <div class="d-flex justify-content-center">
        <form method="post" action="signin.php" class="card form-width-400 mt-3 p-3">
          <div class="form-group">
            <label>Email Address *</label>
            <input name="email" type="email" class="form-control" placeholder="Enter email" required />
          </div>

          <div class="form-group">
            <label>Password *</label>
            <input name="pass" type="password" class="form-control" placeholder="Password" required />
          </div>
          <p class='text-danger'><?php echo $mesg ?></p>
          <button type="submit" class="btn btn-primary">Sign In</button>
          <a style="margin-top: 20px;" class="text-center" href='forgotPass.php'>Forgot Password?</a>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center pt-4 pb-4">
    © 2020 Lucknow University
  </footer>
</body>

</html>