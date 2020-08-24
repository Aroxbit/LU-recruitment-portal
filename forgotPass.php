<?php
$mesg = "";
require_once('./database.php');

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $result = mysqli_query($dbc,"SELECT * FROM users WHERE email='" . $email . "'");
    $count  = mysqli_num_rows($result);
    $the_user = mysqli_fetch_assoc($result);
    if($count==0) {
        $mesg = "No account found with this email address.";
    }
    else{
        $_mail_to = $_POST["email"];
        $_mail_subject = "Lucknow Recruitment Account Recovery";
        $_mail_body = "<h1>Lucknow Recruitment Account Recovery</h1><p>You have requested to access your password for Lucknow University Recruitment account. The password for your account is: <b>" . $the_user["pass"] ."</b></p>";
        require_once('./mail.php');
        $mesg = "We have sent your password to your Email. If you can't find it in your inbox, check your spam folder.";
    }
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
      <h4 class="text-center mt-3 color-green">Forgot Password</h4>

      <div class="d-flex justify-content-center">
        <form method="post" action="forgotPass.php" class="card form-width-400 mt-3 p-3">
          <div class="form-group">
            <label>Email Address *</label>
            <input name="email" type="email" class="form-control" placeholder="Enter email" required />
          </div>
          <p class='text-danger'><?php echo $mesg ?></p>
          <button name='submit' type="submit" class="btn btn-primary">Send My Password</button>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center pt-4 pb-4">
    © 2020 Lucknow University
  </footer>
</body>

</html>