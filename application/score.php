<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');
canEdit($uid);

function create_and_update(){
  global $uid;
  $teaching = $_POST["teaching"];
  $extension = $_POST["extension"];
  $total = $_POST["total"];
  $research = $_POST["research"];

  //insert new candidate data
  $sql = "INSERT INTO score (teaching, extension, total, research, user)
  VALUES ('$teaching', '$extension', '$total', '$research', '$uid')";
  updateRow("score", $uid, $sql);
  header("Location: details.php");
}

//if new data is posted
//if (isset($_POST["teaching"])) create_and_update();

//get api score data
$row = getRow("score", $uid, true);
if($row){
  $teaching = $row["teaching"];
  $extension = $row["extension"];
  $total = $row["total"];
  $research = $row["research"];
}
else{
  $teaching = "";
  $extension = "";
  $total = "";
  $research = "";
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
          <a href="./score.php" class="list-group-item active">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-2">
        <h5>Summary Of API score</h5>
        <p>The API Scores will be calculated later, Skip It.</p>
        <!--  Development of E-learning Material Form -->
        <form class="mt-4" action="score.php" method='post'>
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Criteria</th>
                <th scope="col">Total API score for Assesment Period (as claimed by the applicant)</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>I</td>
                <td>Teaching Learning and Evaluation Related Activities.</td>

                <td>
                  <input disabled name="teaching" value='<?php echo $teaching ?>' type="text" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>II</td>
                <td>Professional Development, Co-curricular and extension Activities.</td>

                <td>
                  <input disabled name="extension" value='<?php echo $extension ?>' type="text" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td></td>
                <td>Total (I + II)</td>

                <td>
                  <input disabled name="total" value='<?php echo $total ?>' type="text" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>III</td>
                <td>Research and Academic Contributions.</td>

                <td>
                  <input disabled name="research" value='<?php echo $research ?>' type="text" class="form-control" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <!-- <button class="btn btn-primary" type="submit" name='submit'>Save & Continue</button> -->
            <a class="btn btn-primary" href='details.php'>Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>