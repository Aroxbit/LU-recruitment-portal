<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');
canEdit($uid);



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
      <a href="../dashboard.php" class="btn btn-primary">Back to Application</a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-3 p-0 bg-light">
        <div class="list-group">
          <a href="./candidate.php" class="list-group-item d-flex justify-content-between">
            <span>Candidate Details</span> 
            <?php
            if($myform['candidate']) echo "<i class='ico-check text-success'></i>";
            else echo "<i class='ico-wrong text-danger'></i>";
            ?>
          </a>
          <a href="./photo_sign.php" class="list-group-item d-flex justify-content-between">
            <span>Photo & Signature</span> 
            <?php
            if($myform['photo_sign']) echo "<i class='ico-check text-success'></i>";
            else echo "<i class='ico-wrong text-danger'></i>";
            ?>
          </a>
          <a href="./academic.php" class="list-group-item d-flex justify-content-between">
            <span>Academic Details</span> 
            <?php
            if($myform['academic']) echo "<i class='ico-check text-success'></i>";
            else echo "<i class='ico-wrong text-danger'></i>";
            ?>  
          </a>
          <a href="./net.php" class="list-group-item">NET / SLET / SET / GATE</a>
          <a href="./documents.php" class="list-group-item d-flex justify-content-between">
            <span>Upload Documents</span> 
            <?php
            if($myform['documents']) echo "<i class='ico-check text-success'></i>";
            else echo "<i class='ico-wrong text-danger'></i>";
            ?> 
          </a>
          <a href="./research.php" class="list-group-item">Research Degree</a>
          <a href="./awards.php" class="list-group-item">Fellowship / Awards</a>
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./specialization.php" class="list-group-item d-flex justify-content-between">
          <span>Field of Specialization</span> 
            <?php
            if($myform['specialization']) echo "<i class='ico-check text-success'></i>";
            else echo "<i class='ico-wrong text-danger'></i>";
            ?> 
          </a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./rac.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./score.php" class="list-group-item">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item active">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-3">
        <h5 class="text-center">DECLARATION</h5>
        <?php
          $class_name = "";
          if(!verifyForm($uid)){
            echo "Please fill all the required fields first.";
            $class_name = "d-none";
          }
        ?>
        <!-- Enter Name here -->
        <p class='<?php echo $class_name ?>'>
          I <?php echo $first_name . " " . $last_name ?>, Son/Daughter of <?php echo $father_name . " & " . $mother_name ?>, hereby declare that all statements and entries
          made in the application are true, complete and correct to the best of my knowledge and belief. In the event
          of any information found being false or incorrect or inelligiblity being detected before or after the Selection
          Committee and Executive Council Meet, my candidature / appointment is liable to be cancelled by University.
        </p>

        <div class='text-center mt-3 <?php echo $class_name ?>'>
          <a href='./form_preview.php' class="btn btn-primary">Accept & Continue</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>