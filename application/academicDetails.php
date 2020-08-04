<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//if the user uploads a new image
if (isset($_POST["submit"])) {
  $target_dir = "uploads/";
  $photo_name = $uid . "_" . time() . "_photo_" . basename($_FILES["photo"]["name"]);
  $sign_name = $uid . "_" . time() . "_sign_" . basename($_FILES["sign"]["name"]);
  $photo_file = $target_dir . $photo_name;
  $sign_file = $target_dir . $sign_name;

  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_file) && move_uploaded_file($_FILES["sign"]["tmp_name"], $sign_file)) {
    echo "The files have been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your files.";
  }

  //find existing candidate data
  $sql_ = "SELECT * FROM photos WHERE user='$uid' LIMIT 1";
  $result_ = mysqli_query($dbc, $sql_);
  $row_ = mysqli_fetch_assoc($result_);
  $count_  = mysqli_num_rows($result_);

  //if it exists then delete it before creating one
  if ($count_ > 0) {
    unlink("./uploads/" . $row_["photo"]);
    unlink("./uploads/" . $row_["sign"]);
    if ($dbc->query("DELETE FROM photos WHERE user='$uid'") === TRUE) {
      echo "Photos deleted successfully";
    } else {
      echo "Error deleting photos: " . $conn->error;
    }
  }

  //insert new candidate data
  $sql = "INSERT INTO photos (photo, sign, user)
  VALUES ('$photo_name', '$sign_name', '$uid')";

  if ($dbc->query($sql) === TRUE) {
    echo "Photos Saved in DB.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }
}


//Set default value
$c10_year = "";
$c12_year = "";
$ug_year = "";
$m_year = "";
$net_year = "";
$other_year = "";
$c10_name = "";
$c12_name = "";
$ug_name = "";
$m_name = "";
$net_name = "";
$other_name = "";
$c10_grade = "";
$c12_grade = "";
$ug_grade = "";
$m_grade = "";
$net_grade = "";
$other_grade = "";
$c10_per = "";
$c12_per = "";
$ug_per = "";
$m_per = "";
$net_per = "";
$other_per = "";
$c10_marks = "";
$c12_marks = "";
$ug_marks = "";
$m_marks = "";
$net_marks = "";
$other_marks = "";
$c10_total = "";
$c12_total = "";
$ug_total = "";
$m_total = "";
$net_total = "";
$other_total = "";
$ug_degree = "";
$ug_subject = "";
$m_degree = "";
$m_subject = "";
$net_degree = "";
$net_subject = "";
$other_degree = "";
$other_subject = "";



//Get user data
$sql = "SELECT * FROM academic WHERE user='$uid' LIMIT 1";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);
$count  = mysqli_num_rows($result);
if ($count == 0) {
  echo "No Academic Details Found!";
} else {
  // print_r($row);
  $c10_year = $row["c10_year"];
  $c12_year = $row["c12_year"];
  $ug_year = $row["ug_year"];
  $m_year = $row["m_year"];
  $net_year = $row["net_year"];
  $other_year = $row["other_year"];
  $c10_name = $row["c10_name"];
  $c12_name = $row["c12_name"];
  $ug_name = $row["ug_name"];
  $m_name = $row["m_name"];
  $net_name = $row["net_name"];
  $other_name = $row["other_name"];
  $c10_grade = $row["c10_grade"];
  $c12_grade = $row["c12_grade"];
  $ug_grade = $row["ug_grade"];
  $m_grade = $row["m_grade"];
  $net_grade = $row["net_grade"];
  $other_grade = $row["other_grade"];
  $c10_per = $row["c10_per"];
  $c12_per = $row["c12_per"];
  $ug_per = $row["ug_per"];
  $m_per = $row["m_per"];
  $net_per = $row["net_per"];
  $other_per = $row["other_per"];
  $c10_marks = $row["c10_marks"];
  $c12_marks = $row["c12_marks"];
  $ug_marks = $row["ug_marks"];
  $m_marks = $row["m_marks"];
  $net_marks = $row["net_marks"];
  $other_marks = $row["other_marks"];
  $c10_total = $row["c10_total"];
  $c12_total = $row["c12_total"];
  $ug_total = $row["ug_total"];
  $m_total = $row["m_total"];
  $net_total = $row["net_total"];
  $other_total = $row["other_total"];
  $ug_degree = $row["ug_degree"];
  $ug_subject = $row["ug_subject"];
  $m_degree = $row["m_degree"];
  $m_subject = $row["m_subject"];
  $net_degree = $row["net_degree"];
  $net_subject = $row["net_subject"];
  $other_degree = $row["other_degree"];
  $other_subject = $row["other_subject"];
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
          <a href="./academicDetails.php" class="list-group-item active">Academic Details</a>
          <a href="./netSlet.php" class="list-group-item">NET / SLET / SET / GATE</a>
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
        <form class="mt-4" action="netSlet.php" method="post">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Examination</th>
                <th scope="col">Year of Passing</th>
                <th scope="col">Name of the Board/University</th>
                <th scope="col">Division / Class / Grade</th>
                <th scope="col">Percentage</th>
                <th scope="col">Marks Obtained</th>
                <th scope="col">Total Marks</th>
              </tr>
            </thead>
            <tbody>
              <!-- 10th -->
              <tr>
                <th scope="row">1</th>
                <td>10th Class or Equivalent *</td>
                <td><input name="c10_year" class="form-control" type="number" placeholder="Year" value="<?php echo $c10_year ?>" required /></td>
                <td><input name="c10_name" class="form-control" type="text" placeholder="Name" value="<?php echo $c10_name ?>" required /></td>
                <td>
                  <select class="custom-select" name="c10_grade" required>
                    <option value="<?php echo $c10_grade ?>"> <?php echo "Select: " . $c10_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="c10_per" class="form-control" type="number" placeholder="Percent" value="<?php echo $c10_per ?>" required /></td>
                <td><input name="c10_marks" class="form-control" type="number" placeholder="Marks Obtained" value="<?php echo $c10_marks ?>" required /></td>
                <td><input name="c10_total" class="form-control" type="number" placeholder="Total" value="<?php echo $c10_total ?>" required /></td>
              </tr>

              <!-- 10+2 -->
              <tr>
                <th scope="row">2</th>
                <td>10+2/High Secondary or Equivalent *</td>
                <td><input name="c12_year" class="form-control" type="number" placeholder="Year" value="<?php echo $c12_year ?>" required /></td>
                <td><input name="c12_name" class="form-control" type="text" placeholder="Name" value="<?php echo $c12_name ?>" required /></td>
                <td>
                  <select class="custom-select" name="c12_grade" required>
                    <option value="<?php echo $c12_grade ?>"> <?php echo "Select: " . $c12_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="c12_per" class="form-control" type="number" placeholder="Percent" value="<?php echo $c12_per ?>" required /></td>
                <td><input name="c12_marks" class="form-control" type="number" placeholder="Marks Obtained" value="<?php echo $c12_marks ?>" required /></td>
                <td><input name="c12_total" class="form-control" type="number" placeholder="Total" value="<?php echo $c12_total ?>" required /></td>
              </tr>

              <!-- Undergraduate -->
              <tr>
                <th scope="row">3</th>
                <td>
                  Undergraduate Degree
                  <input name="ug_degree" class="form-control" type="text" placeholder="Type" value="<?php echo $ug_degree ?>" required />
                  <label>Subjects: </label>
                  <input name="ug_subject" class="form-control" type="text" placeholder="Enter Subjects" value="<?php echo $ug_subject ?>" required />
                </td>
                <td><input name="ug_year" class="form-control" type="number" placeholder="Year" value="<?php echo $ug_year ?>" required /></td>
                <td><input name="ug_name" class="form-control" type="text" placeholder="Name" value="<?php echo $ug_name ?>" required /></td>
                <td>
                  <select class="custom-select" name="ug_grade" required>
                    <option value="<?php echo $ug_grade ?>"> <?php echo "Select: " . $ug_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="ug_per" class="form-control" type="number" placeholder="Percent" value="<?php echo $ug_per ?>" required /></td>
                <td><input name="ug_marks" class="form-control" type="number" placeholder="Marks Obtained" value="<?php echo $ug_marks ?>" required /></td>
                <td><input name="ug_total" class="form-control" type="number" placeholder="Total" value="<?php echo $ug_total ?>" required /></td>
              </tr>

              <!-- Master -->
              <tr>
                <th>4</th>
                <td>
                  Master Degree
                  <input name="m_degree" class="form-control" type="text" placeholder="Type" value="<?php echo $m_degree ?>" />
                  <label>Subjects: </label>
                  <input name="m_subject" class="form-control" type="text" placeholder="Enter Subjects" value="<?php echo $m_subject ?>" />
                </td>
                <td><input name="m_year" class="form-control" type="number" placeholder="Year" value="<?php echo $m_year ?>" /></td>
                <td><input name="m_name" class="form-control" type="text" placeholder="Name" value="<?php echo $m_name ?>" /></td>
                <td>
                  <select class="custom-select" name="m_grade">
                    <option value="<?php echo $m_grade ?>"> <?php echo "Select: " . $m_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="m_per" class="form-control" type="number" placeholder="Percent" value="<?php echo $m_per ?>" /></td>
                <td><input name="m_marks" class="form-control" type="number" placeholder="Marks Obtained" value="<?php echo $m_marks ?>" /></td>
                <td><input name="m_total" class="form-control" type="number" placeholder="Total" value="<?php echo $m_total ?>" /></td>
              </tr>

              <!-- NET -->
              <tr>
                <th>5</th>
                <td>
                  NET / JRF / SLET / GATE
                  <input name="net_degree" class="form-control" type="text" placeholder="Type" value="<?php echo $net_degree ?>" />
                  <label>Subjects: </label>
                  <input name="net_subject" class="form-control" type="text" placeholder="Enter Subjects" value="<?php echo $net_subject ?>" />
                </td>
                <td><input name="net_year" class="form-control" type="number" placeholder="Year" value="<?php echo $net_year ?>" /></td>
                <td><input name="net_name" class="form-control" type="text" placeholder="Name" value="<?php echo $net_name ?>" /></td>
                <td>
                  <select class="custom-select" name="net_grade">
                    <option value="<?php echo $net_grade ?>"> <?php echo "Select: " . $net_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="net_per" class="form-control" type="number" placeholder="Percent" value="<?php echo $net_per ?>" /></td>
                <td><input name="net_marks" class="form-control" type="number" placeholder="Marks Obtained" value="<?php echo $net_marks ?>" /></td>
                <td><input name="net_total" class="form-control" type="number" placeholder="Total" value="<?php echo $net_total ?>" /></td>
              </tr>

              <!-- Others -->
              <tr>
                <th>6</th>
                <td>Other Degree (if any)
                  <input name="other_degree" class="form-control" type="text" placeholder="Type" value="<?php echo $other_degree ?>" />
                  <label>Subjects: </label>
                  <input name="other_subject" class="form-control" type="text" placeholder="Enter Subjects" value="<?php echo $other_subject ?>" />
                </td>

                <td><input name="other_year" class="form-control" type="number" placeholder="Year" value="<?php echo $other_year ?>" /></td>
                <td><input name="other_name" class="form-control" type="text" placeholder="Name" value="<?php echo $other_name ?>" /></td>
                <td>
                  <select class="custom-select" name="other_grade">
                    <option value="<?php echo $other_grade ?>"> <?php echo "Select: " . $other_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="other_per" class="form-control" type="number" placeholder="Percent" value="<?php echo $other_per ?>" /></td>
                <td><input name="other_marks" class="form-control" type="number" placeholder="Marks Obtained" value="<?php echo $other_marks ?>" /></td>
                <td><input name="other_total" class="form-control" type="number" placeholder="Total" value="<?php echo $other_total ?>" /></td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-primary" name="submit" type="submit">Save & Continue</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>