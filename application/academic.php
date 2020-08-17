<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');
canEdit($uid);

//To create/update academic data
function create_and_update(){
  global $uid;
  $c10_year = $_POST["c10_year"];
  $c12_year = $_POST["c12_year"];
  $ug_year = $_POST["ug_year"];
  $m_year = $_POST["m_year"];
  // $net_year = $_POST["net_year"];
  $other_year = $_POST["other_year"];
  $c10_name = $_POST["c10_name"];
  $c12_name = $_POST["c12_name"];
  $ug_name = $_POST["ug_name"];
  $m_name = $_POST["m_name"];
  // $net_name = $_POST["net_name"];
  $other_name = $_POST["other_name"];
  $c10_grade = $_POST["c10_grade"];
  $c12_grade = $_POST["c12_grade"];
  $ug_grade = $_POST["ug_grade"];
  $m_grade = $_POST["m_grade"];
  // $net_grade = $_POST["net_grade"];
  $other_grade = $_POST["other_grade"];
  $c10_per = $_POST["c10_per"];
  $c12_per = $_POST["c12_per"];
  $ug_per = $_POST["ug_per"];
  $m_per = $_POST["m_per"];
  // $net_per = $_POST["net_per"];
  $other_per = $_POST["other_per"];
  $c10_marks = $_POST["c10_marks"];
  $c12_marks = $_POST["c12_marks"];
  $ug_marks = $_POST["ug_marks"];
  $m_marks = $_POST["m_marks"];
  // $net_marks = $_POST["net_marks"];
  $other_marks = $_POST["other_marks"];
  $c10_total = $_POST["c10_total"];
  $c12_total = $_POST["c12_total"];
  $ug_total = $_POST["ug_total"];
  $m_total = $_POST["m_total"];
  // $net_total = $_POST["net_total"];
  $other_total = $_POST["other_total"];
  $ug_degree = $_POST["ug_degree"];
  $ug_subject = $_POST["ug_subject"];
  $m_degree = $_POST["m_degree"];
  $m_subject = $_POST["m_subject"];
  // $net_degree = $_POST["net_degree"];
  // $net_subject = $_POST["net_subject"];
  $other_degree = $_POST["other_degree"];
  $other_subject = $_POST["other_subject"];

  //insert new candidate data
  $sql = "INSERT INTO academic (c10_year, c12_year, ug_year, m_year, other_year, c10_name, c12_name, ug_name, m_name, other_name, c10_grade, c12_grade, ug_grade, m_grade, other_grade, c10_per, c12_per, ug_per, m_per, other_per, c10_marks, c12_marks, ug_marks, m_marks, other_marks, c10_total, c12_total, ug_total, m_total, other_total, ug_degree, ug_subject, m_degree, m_subject, other_degree, other_subject, user)
  VALUES ('$c10_year', '$c12_year', '$ug_year', '$m_year', '$other_year', '$c10_name', '$c12_name', '$ug_name', '$m_name', '$other_name', '$c10_grade', '$c12_grade', '$ug_grade', '$m_grade', '$other_grade', '$c10_per', '$c12_per', '$ug_per', '$m_per', '$other_per', '$c10_marks', '$c12_marks', '$ug_marks', '$m_marks', '$other_marks', '$c10_total', '$c12_total', '$ug_total', '$m_total', '$other_total', '$ug_degree', '$ug_subject', '$m_degree', '$m_subject', '$other_degree', '$other_subject', '$uid')";

  updateRow("academic", $uid, $sql);
  updateForm($uid, 'academic'); // update the form
  header("Location: net.php");
}

// when new data is posted
if(isset($_POST["submit"])) create_and_update();

//Get user data
$row = getRow("academic", $uid, true);
if ($row){
  $c10_year = $row["c10_year"];
  $c12_year = $row["c12_year"];
  $ug_year = $row["ug_year"];
  $m_year = $row["m_year"];
  // $net_year = $row["net_year"];
  $other_year = $row["other_year"];
  $c10_name = $row["c10_name"];
  $c12_name = $row["c12_name"];
  $ug_name = $row["ug_name"];
  $m_name = $row["m_name"];
  // $net_name = $row["net_name"];
  $other_name = $row["other_name"];
  $c10_grade = $row["c10_grade"];
  $c12_grade = $row["c12_grade"];
  $ug_grade = $row["ug_grade"];
  $m_grade = $row["m_grade"];
  // $net_grade = $row["net_grade"];
  $other_grade = $row["other_grade"];
  $c10_per = $row["c10_per"];
  $c12_per = $row["c12_per"];
  $ug_per = $row["ug_per"];
  $m_per = $row["m_per"];
  // $net_per = $row["net_per"];
  $other_per = $row["other_per"];
  $c10_marks = $row["c10_marks"];
  $c12_marks = $row["c12_marks"];
  $ug_marks = $row["ug_marks"];
  $m_marks = $row["m_marks"];
  // $net_marks = $row["net_marks"];
  $other_marks = $row["other_marks"];
  $c10_total = $row["c10_total"];
  $c12_total = $row["c12_total"];
  $ug_total = $row["ug_total"];
  $m_total = $row["m_total"];
  // $net_total = $row["net_total"];
  $other_total = $row["other_total"];
  $ug_degree = $row["ug_degree"];
  $ug_subject = $row["ug_subject"];
  $m_degree = $row["m_degree"];
  $m_subject = $row["m_subject"];
  // $net_degree = $row["net_degree"];
  // $net_subject = $row["net_subject"];
  $other_degree = $row["other_degree"];
  $other_subject = $row["other_subject"];
}
else{
  $c10_year = ""; $c12_year = ""; $ug_year = ""; $m_year = ""; $net_year = "";
  $other_year = ""; $c10_name = ""; $c12_name = ""; $ug_name = ""; $m_name = ""; $net_name = ""; $other_name = "";
  $c10_grade = ""; $c12_grade = ""; $ug_grade = ""; $m_grade = ""; $net_grade = ""; $other_grade = "";
  $c10_per = ""; $c12_per = ""; $ug_per = ""; $m_per = ""; $net_per = ""; $other_per = "";
  $c10_marks = ""; $c12_marks = ""; $ug_marks = ""; $m_marks = ""; $net_marks = ""; $other_marks = "";
  $c10_total = ""; $c12_total = ""; $ug_total = ""; $m_total = ""; $net_total = ""; $other_total = "";
  $ug_degree = ""; $ug_subject = ""; $m_degree = ""; $m_subject = ""; $net_degree = "";
  $net_subject = ""; $other_degree = ""; $other_subject = "";
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
          <a href="./academic.php" class="active list-group-item d-flex justify-content-between">
            <span>Academic Details</span> 
            <?php
            if($myform['academic']) echo "<i class='ico-check text-white'></i>";
            else echo "<i class='ico-wrong text-white'></i>";
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
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./rac.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./score.php" class="list-group-item">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col-9">
        <form class="mt-4" action="academic.php" method="post">
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
                  Undergraduate Degree *
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
                  Master Degree *
                  <input name="m_degree" class="form-control" type="text" placeholder="Type" required value="<?php echo $m_degree ?>" />
                  <label>Subjects: </label>
                  <input name="m_subject" class="form-control" type="text" placeholder="Enter Subjects" required value="<?php echo $m_subject ?>" />
                </td>
                <td><input name="m_year" class="form-control" type="number" placeholder="Year" required value="<?php echo $m_year ?>" /></td>
                <td><input name="m_name" class="form-control" type="text" placeholder="Name" required value="<?php echo $m_name ?>" /></td>
                <td>
                  <select class="custom-select" name="m_grade">
                    <option required value="<?php echo $m_grade ?>"> <?php echo "Select: " . $m_grade ?> </option>
                    <option value="First">First</option>
                    <option value="Second">Second</option>
                    <option value="Third">Third</option>
                  </select>
                </td>
                <td><input name="m_per" class="form-control" type="number" placeholder="Percent" required value="<?php echo $m_per ?>" /></td>
                <td><input name="m_marks" class="form-control" type="number" placeholder="Marks Obtained" required value="<?php echo $m_marks ?>" /></td>
                <td><input name="m_total" class="form-control" type="number" placeholder="Total" required value="<?php echo $m_total ?>" /></td>
              </tr>

              <!-- Others -->
              <tr>
                <th>5</th>
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