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
  $designation = $_POST["designation"];
  $job_nature = $_POST["job_nature"];
  $date_joined = $_POST["date_joined"];
  $date_left = $_POST["date_left"];
  $pay = $_POST["pay"];
  $reason = $_POST["reason"];
  $document = upload($uid, "new_document");


  //insert new data in db
  $sql = "INSERT INTO employment (designation, job_nature, date_joined, date_left, pay, reason, document, user)
  VALUES ('$designation', '$job_nature', '$date_joined', '$date_left', '$pay', '$reason', '$document', '$uid')";
  if ($dbc->query($sql) === TRUE) {
    echo "Data Saved in DB.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }

}

//if del btn is pressed
if(isset($_POST["del"])){
  $id = $_POST["id"];
  $dbc->query("DELETE FROM employment WHERE id='$id'");
}

//get the existing employments
$sql_get = "SELECT * FROM employment WHERE user='$uid'";
$result_get = mysqli_query($dbc, $sql_get);
$count_get  = mysqli_num_rows($result_get);
if ($count_get == 0) {
  echo "No Research Details Found!";
} else {
  // print_r($result_get);
  $count_i = 1;
}

//get the existing employment data
$ug_from = "";
$ug_to = "";
$pg_from = "";
$pg_to = "";
$res_from = "";
$res_to = "";

$result_get_data = mysqli_query($dbc, "SELECT * FROM employment_data WHERE user='$uid' LIMIT 1");
$row_data = mysqli_fetch_assoc($result_get_data);
$count_get_data  = mysqli_num_rows($result_get_data);
if ($count_get_data == 0) {
  echo "No Data Found!";
} else {
  $ug_from = $row_data["ug_from"];
  $ug_to = $row_data["ug_to"];
  $pg_from = $row_data["pg_from"];
  $pg_to = $row_data["pg_to"];
  $res_from = $row_data["res_from"];
  $res_to = $row_data["res_to"];
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
          <a href="./employment.php" class="list-group-item active">Employment Details</a>
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
              <th scope="col">S. N.</th>
              <th scope="col">Designation</th>
              <th scope="col">Nature Of Job / Post</th>
              <th scope="col">Date Joined</th>
              <th scope="col">Date Left</th>
              <th scope="col">Pay Scale / Brand with Grade Pay</th>
              <th scope="col">Reason for leaving</th>
              <th scope="col">Relevent Document</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <?php
              while($row_get = mysqli_fetch_assoc($result_get)){
                echo "<tr scope='row'>";
                echo "<td>" . $count_i . "</td>";
                echo "<td>" . $row_get["designation"] . "</td>";
                echo "<td>" . $row_get["job_nature"] . "</td>";
                echo "<td>" . $row_get["date_joined"] . "</td>";
                echo "<td>" . $row_get["date_left"] . "</td>";
                echo "<td>" . $row_get["pay"] . "</td>";
                echo "<td>" . $row_get["reason"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row_get["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='employment.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row_get["id"] . "'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $count_i = $count_i+1;
              }
            ?>
            </tr>
          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="employment.php" method='post' enctype="multipart/form-data">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Employment Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Designation *</td>

                <td>
                  <input name='designation' type="text" class="form-control" placeholder="Enter Designation" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Nature Of Job / Post *</td>

                <td>
                  <input name='job_nature' type="text" class="form-control" placeholder="Example: Permanent, Temporary">
                </td>
              </tr>

              <tr scope="row">
                <td>Date Joined *</td>

                <td>
                  <input name='date_joined' type="date" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Date Left *</td>

                <td>
                  <input name='date_left' type="date" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Pay Scale / Brand with Grade Pay *</td>

                <td>
                  <input name='pay' type="number" class="form-control" placeholder="Enter Pay Scale" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Reason for leaving *</td>

                <td>
                  <textarea name='reason' type="text" class="form-control" placeholder="Enter reason for leaving" required></textarea>
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max size 300 KB) *</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <input name='add' class="btn btn-warning" type="submit" value='Add'>
          </div>
        </form>


        <!-- Form for teaching experience -->
        <form class="form" action="fields.php" method='post'>
          <div class="inline-form">
            <label>Teaching Experience (In Years)</label>
            <div class="form-row">
              <div class="col-3">Undergraduate Classes:</div>
              <div class="col">
                <input name='ug_from' type="number" class="form-control" placeholder="Year" value='<?php echo $ug_from ?>' />
              </div>
              <div class="p-1">to</div>
              <div class="col">
                <input name='ug_to' type="number" class="form-control" placeholder="Year" value='<?php echo $ug_to ?>' />
              </div>
            </div>

            <div class="form-row mt-3">
              <div class="col-3">Postgraduate Classes:</div>
              <div class="col">
                <input name='pg_from' type="number" class="form-control" placeholder="Year" value='<?php echo $pg_from ?>' />
              </div>
              <div class="p-1">to</div>
              <div class="col">
                <input name='pg_to' type="number" class="form-control" placeholder="Year" value='<?php echo $pg_to ?>' />
              </div>
            </div>
          </div>

          <hr />

          <div class="inline-form">
            <div class="form-row">
              <label class="col-3">Research Experience (In Years): </label>
              <div class="col">
                <input name='res_from' type="number" class="form-control" placeholder="Year" value='<?php echo $res_from ?>' />
              </div>
              <div class="p-1">to</div>
              <div class="col">
                <input name='res_to' type="number" class="form-control" placeholder="Year" value='<?php echo $res_to ?>' />
              </div>
            </div>
          </div>
        <hr />
        <div class="text-center mb-4">
          <input class="btn btn-primary" name='submit' value='Save & Continue' type='submit'>
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