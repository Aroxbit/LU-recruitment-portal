<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');
canEdit($uid);


//if add button is pressed
if(isset($_POST["add"])){
  $name = $_POST["name"];
  $level = $_POST["level"];
  $year = $_POST["year"];
  $university = $_POST["university"];
  $score = $_POST["score"];
  $document = upload($uid, "new_document");


  //insert new data in db
  $sql = "INSERT INTO awards (name, level, year, university, score, document, user)
  VALUES ('$name', '$level', '$year', '$university', '$score', '$document', '$uid')";
  createRow($sql);

}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM awards WHERE id='$id'");
}

//get the existing netdata
$sql_get = "SELECT * FROM awards WHERE user='$uid'";
$result_get = mysqli_query($dbc, $sql_get);
$count_get  = mysqli_num_rows($result_get);
if ($count_get == 0) {
  echo "No Research Details Found!";
} else {
  // print_r($result_get);
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
          <a href="./awards.php" class="list-group-item active">Fellowship / Awards</a>
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
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <!-- Form Section -->
      <div class="col">
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">SI No.</th>
              <th scope="col">Fellowship / Award Name</th>
              <th scope="col">Level</th>
              <th scope="col">Name of Academic Body / Association</th>
              <th scope="col">Year</th>
              <th scope="col">API score</th>
              <th scope="col">Document</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <?php
              while($row_get = mysqli_fetch_assoc($result_get)){
                echo "<tr scope='row'>";
                echo "<td>" . $count_i . "</td>";
                echo "<td>" . $row_get["name"] . "</td>";
                echo "<td>" . $row_get["level"] . "</td>";
                echo "<td>" . $row_get["year"] . "</td>";
                echo "<td>" . $row_get["university"] . "</td>";
                echo "<td>" . $row_get["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row_get["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='awards.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row_get["id"] . "'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $count_i = $count_i+1;
              }
            ?>
          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="awards.php" method='post' enctype="multipart/form-data">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Fellowship / Award</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Fellowship / Award Name *</td>

                <td>
                  <input name='name' type="text" class="form-control" placeholder="Enter Fellowship / Award Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Level *</td>

                <td>
                  <select name='level' class="custom-select" required>
                    <option value="">Select Level</option>
                    <option value="University">University</option>
                    <option value="State">State</option>
                    <option value="National">National</option>
                    <option value="International">International</option>
                  </select>
                </td>
              </tr>

              <tr scope="row">
                <td>Year *</td>

                <td>
                  <input name='year' type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Name of University / Institution *</td>

                <td>
                  <input name='university' type="text" class="form-control" placeholder="Enter University/Institution" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="API Score will be calculated later" disabled />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document *</td>
                <td>
                  <input name='new_document' type="file" accept="image/jpg, image/png, application/pdf" class="form-control" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit" name='add'>Add</button>
            <a href="./documents.php" class="btn btn-primary">Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>