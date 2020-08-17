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
  $duration = $_POST["duration"];
  $university = $_POST["university"];
  $score = $_POST["score"];
  $document = upload($uid, "new_document");

  $sql = "INSERT INTO evaluation (name, duration, university, score, document, user)
  VALUES ('$name', '$duration', '$university', '$score', '$document', '$uid')";
  createRow($sql);

}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM evaluation WHERE id='$id'");
}

//get the existing evaluations
$result_get = getRow("evaluation", $uid, false);
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
          <a href="./evaluations.php" class="list-group-item active">Teaching, Learning & Evaluation related activities</a>
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
              <th scope="col">S.N.</th>
              <th scope="col">Name / Nature of the activity</th>
              <th scope="col">Duration</th>
              <th scope="col">Organising University / Institution</th>
              <th scope="col">API score</th>
              <th scope="col">Document</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <?php
              $count_i = 1;
              while($row_get = mysqli_fetch_assoc($result_get)){
                echo "<tr scope='row'>";
                echo "<td>" . $count_i . "</td>";
                echo "<td>" . $row_get["name"] . "</td>";
                echo "<td>" . $row_get["duration"] . "</td>";
                echo "<td>" . $row_get["university"] . "</td>";
                echo "<td>" . $row_get["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row_get["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='evaluations.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row_get["id"] . "'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $count_i = $count_i+1;
              }
            ?>
          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="evaluations.php" method='post' enctype="multipart/form-data">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Activity Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Name / Nature of the activity *</td>

                <td>
                  <input name='name' type="text" class="form-control" placeholder="Enter Name / Nature of the activity" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Duration *</td>

                <td>
                  <input name='duration' type="text" class="form-control" placeholder="Enter Duration" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organising University / Institution Name *</td>

                <td>
                  <input name='university' type="text" class="form-control" placeholder="Enter Organising University / Institution Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="API Score will be calculated later" disabled />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <input class="btn btn-warning" type="submit" name='add' value='Add'>
            <a href="./rac.php" class="btn btn-primary">Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script>
  function validate() {
    let input = event.target;

    if (input.files[0].size > 300000) {
      alert("Image size cannot be more than 300 KB.");
      input.value = "";
    }
  }
</script>

</html>