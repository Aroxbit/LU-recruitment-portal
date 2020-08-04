<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//if the user uploads a new image
if(isset($_POST["c10_year"])) {

  //set vars
  $c10_year = $_POST["c10_year"];
  $c12_year = $_POST["c12_year"];
  $ug_year = $_POST["ug_year"];
  $m_year = $_POST["m_year"];
  $net_year = $_POST["net_year"];
  $other_year = $_POST["other_year"];
  $c10_name = $_POST["c10_name"];
  $c12_name = $_POST["c12_name"];
  $ug_name = $_POST["ug_name"];
  $m_name = $_POST["m_name"];
  $net_name = $_POST["net_name"];
  $other_name = $_POST["other_name"];
  $c10_grade = $_POST["c10_grade"];
  $c12_grade = $_POST["c12_grade"];
  $ug_grade = $_POST["ug_grade"];
  $m_grade = $_POST["m_grade"];
  $net_grade = $_POST["net_grade"];
  $other_grade = $_POST["other_grade"];
  $c10_per = $_POST["c10_per"];
  $c12_per = $_POST["c12_per"];
  $ug_per = $_POST["ug_per"];
  $m_per = $_POST["m_per"];
  $net_per = $_POST["net_per"];
  $other_per = $_POST["other_per"];
  $c10_marks = $_POST["c10_marks"];
  $c12_marks = $_POST["c12_marks"];
  $ug_marks = $_POST["ug_marks"];
  $m_marks = $_POST["m_marks"];
  $net_marks = $_POST["net_marks"];
  $other_marks = $_POST["other_marks"];
  $c10_total = $_POST["c10_total"];
  $c12_total = $_POST["c12_total"];
  $ug_total = $_POST["ug_total"];
  $m_total = $_POST["m_total"];
  $net_total = $_POST["net_total"];
  $other_total = $_POST["other_total"];
  $ug_degree = $_POST["ug_degree"];
  $ug_subject = $_POST["ug_subject"];
  $m_degree = $_POST["m_degree"];
  $m_subject = $_POST["m_subject"];
  $net_degree = $_POST["net_degree"];
  $net_subject = $_POST["net_subject"];
  $other_degree = $_POST["other_degree"];
  $other_subject = $_POST["other_subject"];

  //find existing candidate data
  $sql_ = "SELECT * FROM academic WHERE user='$uid' LIMIT 1";
  $result_ = mysqli_query($dbc, $sql_);
  $row_ = mysqli_fetch_assoc($result_);
  $count_  = mysqli_num_rows($result_);

  //if it exists then delete it before creating one
  if ($count_ > 0) {
    if ($dbc->query("DELETE FROM academic WHERE user='$uid'") === TRUE) {
      echo "Academic details deleted successfully";
    } else {
      echo "Error deleting Academic details: " . $conn->error;
    }
  }

  //insert new candidate data
  $sql = "INSERT INTO academic (c10_year, c12_year, ug_year, m_year, net_year, other_year, c10_name, c12_name, ug_name, m_name, net_name, other_name, c10_grade, c12_grade, ug_grade, m_grade, net_grade, other_grade, c10_per, c12_per, ug_per, m_per, net_per, other_per, c10_marks, c12_marks, ug_marks, m_marks, net_marks, other_marks, c10_total, c12_total, ug_total, m_total, net_total, other_total, ug_degree, ug_subject, m_degree, m_subject, net_degree, net_subject, other_degree, other_subject, user)
  VALUES ('$c10_year', '$c12_year', '$ug_year', '$m_year', '$net_year', '$other_year', '$c10_name', '$c12_name', '$ug_name', '$m_name', '$net_name', '$other_name', '$c10_grade', '$c12_grade', '$ug_grade', '$m_grade', '$net_grade', '$other_grade', '$c10_per', '$c12_per', '$ug_per', '$m_per', '$net_per', '$other_per', '$c10_marks', '$c12_marks', '$ug_marks', '$m_marks', '$net_marks', '$other_marks', '$c10_total', '$c12_total', '$ug_total', '$m_total', '$net_total', '$other_total', '$ug_degree', '$ug_subject', '$m_degree', '$m_subject', '$net_degree', '$net_subject', '$other_degree', '$other_subject', '$uid')";

  if ($dbc->query($sql) === TRUE) {
    echo "Academic Details Saved in DB.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }
}

//if add button is pressed
if(isset($_POST["add"])){
  $type = $_POST["type"];
  $agency = $_POST["agency"];
  $year = $_POST["year"];
  $subject = $_POST["subject"];

  //insert new data in db
  $sql = "INSERT INTO net (type, agency, year, subject, user)
  VALUES ('$type', '$agency', '$year', '$subject', '$uid')";
  if ($dbc->query($sql) === TRUE) {
    echo "Data Saved in DB.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }

}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM net WHERE id='$id'");
}

//get the existing netdata
$sql_get = "SELECT * FROM net WHERE user='$uid'";
$result_get = mysqli_query($dbc, $sql_get);
$count_get  = mysqli_num_rows($result_get);
if ($count_get == 0) {
  echo "No Net-Slet-Set-Gate Details Found!";
} else {
  $count_i = 1;
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
          <a href="./netSlet.php" class="list-group-item active">NET / SLET / SET / GATE</a>
          <a href="./uploadDocuments.php" class="list-group-item">Upload Documents</a>
          <a href="./researchDegree.php" class="list-group-item">Research Degree</a>
          <a href="./awards.php" class="list-group-item">Fellowship / Awards</a>
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./fields.php" class="list-group-item">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./academicContributions.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./apiScore.php" class="list-group-item">API score</a>
          <a href="./otherDetails.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">SI No.</th>
              <th scope="col">NET / SLET / SET / GATE Type</th>
              <th scope="col">Name Of Agency</th>
              <th scope="col">Year Of Award</th>
              <th scope="col">Subject</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <!-- <tr scope="row">
              <td>0</td>
              <td>SET</td>
              <td>Arunachal Pradesh</td>
              <td>2020</td>
              <td>Computer Science</td>
              <td><form action='netSlet.php' method='post'> 
                  <input type='text' name='id'  class='d-none' value='0'>
                  <input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr> -->
              <!-- <td><button class="btn btn-danger">Delete</button></td> -->

            <?php
              while($row_get = mysqli_fetch_assoc($result_get)){
                echo "<tr scope='row'>";
                echo "<td>" . $count_i . "</td>";
                echo "<td>" . $row_get["type"] . "</td>";
                echo "<td>" . $row_get["agency"] . "</td>";
                echo "<td>" . $row_get["year"] . "</td>";
                echo "<td>" . $row_get["subject"] . "</td>";
                echo "<td><form action='netSlet.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row_get["id"] . "'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $count_i = $count_i+1;
              }
            ?>

          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="netSlet.php" method="post">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">NET / SLET / SET / GATE</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Details of NET / SLET / SET / GATE conducted by UGC/CSIR/ICAR State? *</td>

                <td>
                  <select name='type' class="custom-select" required>
                    <option>Select Type</option>
                    <option value="NET">NET</option>
                    <option value="SLET">SLET</option>
                    <option value="SET">SET</option>
                    <option value="GATE">GATE</option>
                  </select>
                </td>

              </tr>

              <tr scope="row">
                <td>Name Of The Agency *</td>

                <td>
                  <input name='agency' type="text" class="form-control" placeholder="Enter Agency Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year Of Award *</td>

                <td>
                  <input name='year' type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Subject *</td>

                <td>
                  <input name='subject' type="text" class="form-control" placeholder="Enter Subject" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit" name="add">Add</button>
            <a href="./uploadDocuments.php" class="btn btn-primary">Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>