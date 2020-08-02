<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//if the user uploads a new image
if(isset($_POST["submit"])) {
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

  require_once('../database.php');

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
        <form class="mt-4" action="">
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
                <td><input class="form-control" type="number" placeholder="Year" required /></td>
                <td><input class="form-control" type="text" placeholder="Name" required /></td>
                <td>
                  <select class="custom-select" name="division" required>
                    <option>Select Division</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input class="form-control" type="number" placeholder="Percent" required /></td>
                <td><input class="form-control" type="number" placeholder="Marks Obtained" required /></td>
                <td><input class="form-control" type="number" placeholder="Total" required /></td>
              </tr>

              <!-- 10+2 -->
              <tr>
                <th scope="row">2</th>
                <td>10+2/High Secondary or Equivalent *</td>
                <td><input class="form-control" type="number" placeholder="Year" required /></td>
                <td><input class="form-control" type="text" placeholder="Name" required /></td>
                <td>
                  <select class="custom-select" name="division" required>
                    <option>Select Division</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input class="form-control" type="number" placeholder="Percent" required /></td>
                <td><input class="form-control" type="number" placeholder="Marks Obtained" required /></td>
                <td><input class="form-control" type="number" placeholder="Total" required /></td>
              </tr>

              <!-- Undergraduate -->
              <tr>
                <th scope="row">3</th>
                <td>
                  Undergraduate Degree
                  <input class="form-control" type="text" placeholder="Type" required />
                  <label>Subjects: </label>
                  <input class="form-control" type="text" placeholder="Enter Subjects" required />
                </td>
                <td><input class="form-control" type="number" placeholder="Year" required /></td>
                <td><input class="form-control" type="text" placeholder="Name" required /></td>
                <td>
                  <select class="custom-select" name="division" required>
                    <option>Select Division</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input class="form-control" type="number" placeholder="Percent" required /></td>
                <td><input class="form-control" type="number" placeholder="Marks Obtained" required /></td>
                <td><input class="form-control" type="number" placeholder="Total" required /></td>
              </tr>

              <!-- Master -->
              <tr>
                <th>4</th>
                <td>
                  Master Degree
                  <input class="form-control" type="text" placeholder="Type" />
                  <label>Subjects: </label>
                  <input class="form-control" type="text" placeholder="Enter Subjects" />
                </td>
                <td><input class="form-control" type="number" placeholder="Year" /></td>
                <td><input class="form-control" type="text" placeholder="Name" /></td>
                <td>
                  <select class="custom-select" name="division">
                    <option>Select Division</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input class="form-control" type="number" placeholder="Percent" /></td>
                <td><input class="form-control" type="number" placeholder="Marks Obtained" /></td>
                <td><input class="form-control" type="number" placeholder="Total" /></td>
              </tr>

              <!-- NET -->
              <tr>
                <th>5</th>
                <td>
                  NET / JRF / SLET / GATE
                  <input class="form-control" type="text" placeholder="Type" />
                  <label>Subjects: </label>
                  <input class="form-control" type="text" placeholder="Enter Subjects" />
                </td>
                <td><input class="form-control" type="number" placeholder="Year" /></td>
                <td><input class="form-control" type="text" placeholder="Name" /></td>
                <td>
                  <select class="custom-select" name="division">
                    <option>Select Division</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input class="form-control" type="number" placeholder="Percent" /></td>
                <td><input class="form-control" type="number" placeholder="Marks Obtained" /></td>
                <td><input class="form-control" type="number" placeholder="Total" /></td>
              </tr>

              <!-- Others -->
              <tr>
                <th>6</th>
                <td>Other Degree (if any)
                  <input class="form-control" type="text" placeholder="Type" />
                  <label>Subjects: </label>
                  <input class="form-control" type="text" placeholder="Enter Subjects" />
                </td>

                <td><input class="form-control" type="number" placeholder="Year" /></td>
                <td><input class="form-control" type="text" placeholder="Name" /></td>
                <td>
                  <select class="custom-select" name="division">
                    <option>Select Division</option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input class="form-control" type="number" placeholder="Percent" /></td>
                <td><input class="form-control" type="number" placeholder="Marks Obtained" /></td>
                <td><input class="form-control" type="number" placeholder="Total" /></td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-primary" type="submit">Save & Continue</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>