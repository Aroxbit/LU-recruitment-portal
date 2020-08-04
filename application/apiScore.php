<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//initialize candidate vars
$teaching = "";
$extension = "";
$total = "";
$research = "";

//get candidate data
$sql = "SELECT * FROM score WHERE user='$uid' LIMIT 1";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);
$count  = mysqli_num_rows($result);
if($count==0) {
  echo "No Score Data Found!";
} else{
  //print_r($row);
  // If candidate data is found, assign it to vars
  $teaching = $row["teaching"];
  $extension = $row["extension"];
  $total = $row["total"];
  $research = $row["research"];
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
          <a href="./apiScore.php" class="list-group-item active">API score</a>
          <a href="./otherDetails.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-2">
        <h5>Summary Of API score</h5>

        <!--  Development of E-learning Material Form -->
        <form class="mt-4" action="">
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
                <td>Teaching Learning and Evaluation Related Activities. *</td>

                <td>
                  <input name="teaching" value='<?php echo $teaching ?>' type="text" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>II</td>
                <td>Professional Development, Co-curricular and extension Activities. *</td>

                <td>
                  <input name="extension" value='<?php echo $extension ?>' type="text" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td></td>
                <td>Total (I + II) *</td>

                <td>
                  <input name="total" value='<?php echo $total ?>' type="text" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>III</td>
                <td>Research and Academic Contributions. *</td>

                <td>
                  <input name="research" value='<?php echo $research ?>' type="text" class="form-control" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-primary" type="submit">Add & Continue</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>