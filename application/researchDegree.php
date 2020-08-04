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


//if add button is pressed
if(isset($_POST["add"])){
  $name = $_POST["name"];
  $title = $_POST["title"];
  $year = $_POST["year"];
  $university = $_POST["university"];
  $document = upload($uid, "new_document");

  //insert new data in db
  $sql = "INSERT INTO research (name, title, year, university, document, user)
  VALUES ('$name', '$title', '$year', '$university', '$document', '$uid')";
  if ($dbc->query($sql) === TRUE) {
    echo "Data Saved in DB.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }

}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM research WHERE id='$id'");
}

//get the existing netdata
$sql_get = "SELECT * FROM research WHERE user='$uid'";
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
          <a href="./researchDegree.php" class="list-group-item active">Research Degree</a>
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
              <th scope="col">Name of degree</th>
              <th scope="col">Title</th>
              <th scope="col">Date of Award of degree.</th>
              <th scope="col">Institution / University</th>
              <th scope="col">Document</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <!-- <tr scope="row">
              <td>1</td>
              <td>SET</td>
              <td>AAA</td>
              <td>2020</td>
              <td>Computer Science</td>
              <td><a href="#">See your Document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr> -->

            <?php
              while($row_get = mysqli_fetch_assoc($result_get)){
                echo "<tr scope='row'>";
                echo "<td>" . $count_i . "</td>";
                echo "<td>" . $row_get["name"] . "</td>";
                echo "<td>" . $row_get["title"] . "</td>";
                echo "<td>" . $row_get["year"] . "</td>";
                echo "<td>" . $row_get["university"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row_get["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='researchDegree.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row_get["id"] . "'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $count_i = $count_i+1;
              }
            ?>




          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="researchDegree.php" method='post' enctype="multipart/form-data">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Research Degree</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Degree Name *</td>

                <td>
                  <input name="name" type="text" class="form-control" placeholder="Enter Degree Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Degree Title *</td>

                <td>
                  <input name="title" type="text" class="form-control" placeholder="Degree title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year Of Award *</td>

                <td>
                  <input name="year" type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>University / Institution *</td>

                <td>
                  <input name="university" type="text" class="form-control" placeholder="Enter University/Institution" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max size 300 KB) *</td>
                <td>
                  <input name="new_document" onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <input class="btn btn-warning" type="submit" name="add" value="Add">
            <a href="./uploadDocuments.php" class="btn btn-primary">Continue</a>
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