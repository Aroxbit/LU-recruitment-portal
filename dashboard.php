<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('./database.php');

$form = getForm($uid);
$payment = $form["payment"];
$is_complete = verifyForm($uid);
if($payment) $cl2 = "text-success";
if($is_complete) $cl1 = "text-success";
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
    <a href="./" class="navbar-brand">
      <!-- Desktop Logo-->
      <img class="d-none d-md-block" src="./assets/logo.png" alt="Logo" width="300" />

      <!-- Mobile Logo -->
      <img class="d-sm-block d-md-none" src="./assets/LU_Logo.png" alt="Lucknow University Logo" width="100" />
    </a>

    <div class="inline-flex">
      <a href="./changePassword.php" class="btn btn-primary">Change Password</a>
      <a href="./signin.php?logout" class="btn btn-info">Logout <?php echo $_SESSION["email"] ?></a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="content d-flex justify-content-center p-4">
      <div class="list-group form-width-400">
        <a href="./application/candidate.php" class="list-group-item list-group-item-action">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
          </svg>
          <span class='<?php echo $cl1 ?>'>My Application</span>
        </a>
        
        <a href="./application/form_preview.php" class="list-group-item list-group-item-action">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <circle cx="12" cy="12" r="2" />
            <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
            <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
          </svg>
          <span class='<?php echo $cl1 ?>'>Preview Form</span>
        </a>

        <a href="#" class="list-group-item list-group-item-action">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <rect x="7" y="9" width="14" height="10" rx="2" />
            <circle cx="14" cy="14" r="2" />
            <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
          </svg>
          <span class='<?php echo $cl2 ?>'>Make Payment</span>
        </a>
      </div>
    </div>
  </div>

  <footer class="text-center pt-4 pb-4">
    © 2020 Lucknow University
  </footer>
</body>

</html>