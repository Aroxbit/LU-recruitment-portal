<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  $_SESSION['email'] = "14sarthi@gmail.com";
}
$uid = $_SESSION['email'];
require_once('../database.php');


//if new data is posted 
if (isset($_POST["submit"])) {

  //employment data
  $ug_from = $_POST["ug_from"];
  $ug_to = $_POST["ug_to"];
  $pg_from = $_POST["pg_from"];
  $pg_to = $_POST["pg_to"];
  $res_from = $_POST["res_from"];
  $res_to = $_POST["res_to"];
  $user = $uid;

  //find existing employment data
  $sql_ = "SELECT * FROM employment_data WHERE user='$uid' LIMIT 1";
  $result_ = mysqli_query($dbc, $sql_);
  $count_  = mysqli_num_rows($result_);

  //if it exists then delete it before creating one
  if ($count_ > 0) {
    if ($dbc->query("DELETE FROM employment_data WHERE user='$uid'") === TRUE) {
      echo "Employment data deleted successfully";
    } else {
      echo "Error deleting old data: " . $conn->error;
    }
  }

  //insert new candidate data
  $sql = "INSERT INTO employment_data (ug_from, ug_to, pg_from, pg_to, res_from, res_to, user)
  VALUES ( '$ug_from', '$ug_to', '$pg_from', '$pg_to', '$res_from', '$res_to', '$user')";

  if ($dbc->query($sql) === TRUE) {
    echo "Data Saved.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }
}

 
//get specialization data
$specialization = "";
$result_get_data = mysqli_query($dbc, "SELECT * FROM specialization WHERE user='$uid' LIMIT 1");
$row_data = mysqli_fetch_assoc($result_get_data);
$count_get_data  = mysqli_num_rows($result_get_data);
if ($count_get_data == 0) {
  echo "No Data Found!";
} else {
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
          <a href="./uploadPhoto.php" class="list-group-item">Upload Photo And Signature</a>
          <a href="./academicDetails.php" class="list-group-item">Academic Details</a>
          <a href="./netSlet.php" class="list-group-item">NET / SLET / SET / GATE</a>
          <a href="./uploadDocuments.php" class="list-group-item">Upload Documents</a>
          <a href="./researchDegree.php" class="list-group-item">Research Degree</a>
          <a href="./awards.php" class="list-group-item">Fellowship / Awards</a>
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./fields.php" class="list-group-item active">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./academicContributions.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./apiScore.php" class="list-group-item">API score</a>
          <a href="./otherDetails.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-3">
        <h5>Enter field of specializations</h5>
        <form action="evaluations.php" method='post'>
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