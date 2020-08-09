<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  $_SESSION['email'] = "14sarthi@gmail.com";
}
$uid = $_SESSION['email'];
require_once('../database.php');


//if new data is posted 
if (isset($_POST["specialization"])) {
  $specialization = $_POST["specialization"];
  $sql = "INSERT INTO specialization (detail, user)
  VALUES ('$specialization', '$uid')";
  updateRow("specialization", $uid, $sql);
  header("Location: evaluations.php");
} 

//get specialization data
$specialization = "";
$row_data = getRow("specialization", $uid, true);
if ($row_data) {
  $specialization = $row_data["detail"];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../src/main.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <title>Lucknow University Recruitment Portal</title>
</head>

<body>
  <nav class="navbar border-bottom">
    <div class="nav-brand">
      <h5>Application Form</h5>
    </div>
    <div class="inline-flex">
      <a href="#" class="btn btn-primary">Back to Application</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-3 p-0 bg-light">
        <div class="list-group">
          <a href="./candidate.php" class="list-group-item">Candidate Details</a>
          <a href="./photo_sign.php" class="list-group-item">Upload Photo And Signature</a>
          <a href="./academic.php" class="list-group-item">Academic Details</a>
          <a href="./net.php" class="list-group-item">NET / SLET / SET / GATE</a>
          <a href="./documents.php" class="list-group-item">Upload Documents</a>
          <a href="./research.php" class="list-group-item">Research Degree</a>
          <a href="./awards.php" class="list-group-item">Fellowship / Awards</a>
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./specialization.php" class="list-group-item active">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./rac.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./score.php" class="list-group-item">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-3">
        <h5>Enter field of specializations</h5>
        <form action="specialization.php" method='post'>
          <textarea name='specialization' class="form-control" name="" id="" rows="10" placeholder="Enter field of specialization."> <?php echo $specialization ?> </textarea>

          <div class="text-center">
            <input type="submit" class="btn btn-primary mt-3" value='Save & Continue'>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>