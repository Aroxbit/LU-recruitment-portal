<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//initialize candidate vars
$first_name = "{Your";
$last_name = "Name}"; 
$father_name = "{Father's Name}";
$mother_name = "{Mother's Name}";


//get candidate data
$sql = "SELECT * FROM candidate WHERE user='$uid' LIMIT 1";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);
$count  = mysqli_num_rows($result);
if($count==0) {
  echo "No Candidate Found!";
} else{
  $first_name = $row["first_name"]; 
  $last_name = $row["last_name"]; 
  $father_name = $row["father_name"]; 
  $mother_name = $row["mother_name"]; 
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
          <a href="./fields.php" class="list-group-item">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./academicContributions.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./apiScore.php" class="list-group-item">API score</a>
          <a href="./otherDetails.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item active">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-3">
        <h5 class="text-center">DECLARATION</h5>

        <!-- Enter Name here -->
        <p class="">
          I <?php echo $last_name . " " . $last_name ?>, Son/Daughter of <?php echo $father_name . " & " . $mother_name ?>, hereby declare that all statements and entries
          made in the application are true, complete and correct to the best of my knowledge and belief. In the event
          of any information found being false or incorrect or inelligiblity being detected before or after the Selection
          Committee and Executive Council Meet, my candidature / appointment is liable to be cancelled by University.
        </p>

        <div class="text-center mt-3">
          <button class="btn btn-primary">Accept & Continue</button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>