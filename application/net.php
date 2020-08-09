<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//if add button is pressed
if(isset($_POST["add"])){
  $type = $_POST["type"];
  $agency = $_POST["agency"];
  $year = $_POST["year"];
  $subject = $_POST["subject"];

  //insert new data in db
  $sql = "INSERT INTO net (type, agency, year, subject, user)
  VALUES ('$type', '$agency', '$year', '$subject', '$uid')";
  createRow($sql);
}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM net WHERE id='$id'");
}

//get the existing netdata
$result_get = getRow("net", $uid, false);

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
          <a href="./net.php" class="list-group-item active">NET / SLET / SET / GATE</a>
          <a href="./documents.php" class="list-group-item">Upload Documents</a>
          <a href="./research.php" class="list-group-item">Research Degree</a>
          <a href="./awards.php" class="list-group-item">Fellowship / Awards</a>
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./specialization.php" class="list-group-item">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./rac.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./score.php" class="list-group-item">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
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
              <td><form action='net.php' method='post'> 
                  <input type='text' name='id'  class='d-none' value='0'>
                  <input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr> -->
              <!-- <td><button class="btn btn-danger">Delete</button></td> -->
            <?php
            $count_i = 1;
              while($row_get = mysqli_fetch_assoc($result_get)){
                echo "<tr scope='row'>";
                echo "<td>" . $count_i . "</td>";
                echo "<td>" . $row_get["type"] . "</td>";
                echo "<td>" . $row_get["agency"] . "</td>";
                echo "<td>" . $row_get["year"] . "</td>";
                echo "<td>" . $row_get["subject"] . "</td>";
                echo "<td><form action='net.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row_get["id"] . "'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $count_i = $count_i+1;
              }
            ?>

          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="net.php" method="post">
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
            <a href="./documents.php" class="btn btn-primary">Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>