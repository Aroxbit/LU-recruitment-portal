<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//File Upload Function
function upload($uid, $field_name){
  print_r($_FILES);
  $target_dir = "uploads/";
  $file_name = $uid . "_" . time() . "_doc_" . basename($_FILES["$field_name"]["name"]);
  $file_location = $target_dir . $file_name;

  if (move_uploaded_file($_FILES["$field_name"]["tmp_name"], $file_location)) {
    return $file_name;
  } else {
    echo "Sorry, there was an error uploading your file.";
    return null;
  }
}

//if new data is posted 
if (isset($_POST["specialization"])) {

  //employment data
  $specialization = $_POST["specialization"];

  //find existing employment data
  $sql_ = "SELECT * FROM specialization WHERE user='$uid' LIMIT 1";
  $result_ = mysqli_query($dbc, $sql_);
  $count_  = mysqli_num_rows($result_);

  //if it exists then delete it before creating one
  if ($count_ > 0) {
    if ($dbc->query("DELETE FROM specialization WHERE user='$uid'") === TRUE) {
      echo "specialization data deleted successfully";
    } else {
      echo "Error deleting old specialization data: " . $conn->error;
    }
  }

  //insert new candidate data
  $sql = "INSERT INTO specialization (detail, user)
  VALUES ('$specialization', '$uid')";
  if ($dbc->query($sql) === TRUE) {
    echo "Data Saved.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }
}


//if add button is pressed
if(isset($_POST["add"])){
  $name = $_POST["name"];
  $duration = $_POST["duration"];
  $university = $_POST["university"];
  $score = $_POST["score"];
  $document = upload($uid, "new_document");


  //insert new data in db
  $sql = "INSERT INTO evaluation (name, duration, university, score, document, user)
  VALUES ('$name', '$duration', '$university', '$score', '$document', '$uid')";
  if ($dbc->query($sql) === TRUE) {
    echo "Data Saved in DB.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }

}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM evaluation WHERE id='$id'");
}

//get the existing evaluations
$sql_get = "SELECT * FROM evaluation WHERE user='$uid'";
$result_get = mysqli_query($dbc, $sql_get);
$count_get  = mysqli_num_rows($result_get);
if ($count_get == 0) {
  echo "No Evaluation Details Found!";
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
          <a href="./evaluations.php" class="list-group-item active">Teaching, Learning & Evaluation related activities</a>
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
                <td>API score *</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="Enter API Score" required />
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
            <a href="./academicContributions.php" class="btn btn-primary">Continue</a>
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