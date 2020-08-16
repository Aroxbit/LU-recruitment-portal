<?php
session_start();
require_once('./database.php');
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}

$mesg = "";

if(isset($_POST["submit"])){
  $email = $_SESSION['email'];
  $pass = $_POST["currentPass"];
  $newPass = $_POST["newPass"];

  $result = mysqli_query($dbc,"SELECT * FROM users WHERE email='" . $email . "' and pass = '". $pass."'");
  $count  = mysqli_num_rows($result);
  $the_user = mysqli_fetch_assoc($result);
  if($count==0) {
    $mesg = "You entered wrong current password.";
  }
  else{
    $sql = "UPDATE users SET pass='$newPass' WHERE email='$email'";
    createRow($sql);
    header("Location: dashboard.php");
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
      <a href="./dashboard.php" class="btn btn-primary">Back To Dashboard</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="content pb-3">
      <!-- Heading -->
      <h4 class="text-center mt-3 color-green">Change Password</h4>

      <div class="d-flex justify-content-center">
        <form onsubmit="handleValidation()" method="post" action="changePassword.php" class="card form-width-400 mt-3 p-3" action='changePassword.php'>
          <div class="form-group">
            <label>Current Password *</label>
            <input name="currentPass" type="password" class="form-control" placeholder="Enter Current Password" required />
          </div>

          <div class="form-group">
            <label>New Password *</label>
            <input id="newPass" name="newPass" type="password" class="form-control" placeholder="New Password" required />
          </div>

          <div class="form-group">
            <label>Confirm New Password *</label>
            <input id="confirmNewPass" name="confirmNewPass" type="password" class="form-control" placeholder="Confirm New Password" required />
          </div>
          <p class='text-danger'><?php echo $mesg ?></p>
          <button type="submit" class="btn btn-primary" name="submit">Change Password</button>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center pt-4 pb-4">
    © 2020 Lucknow University
  </footer>
</body>

<script>
    function handleValidation(){
    const type = document.getElementById("newPass");
    const confirmtype = document.getElementById("confirmNewPass");

    if(type.value !== confirmtype.value) {
    event.preventDefault();
      alert("New Password did not match.");
      confirmtype.focus();
    }
  }
</script>

</html>