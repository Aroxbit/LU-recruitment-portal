<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');
canEdit($uid);


//if new pic is uploaded
if(isset($_POST["upload"])){
  $field_name = $_POST["name"];
  $doc_name = upload($uid, $field_name);

  $update_sql = "UPDATE documents SET " . $field_name ."='./uploads/" . $doc_name . "' WHERE user='$uid'";
  if(!(mysqli_query($dbc, $update_sql))){
    echo "Error updating record: " . mysqli_error($conn);
  }
}



//Initialize the vars
$c10 = '#';
$c12 = '#';
$ug = '#';
$pg = '#';
$net = '#';
$other = '#';

//check if the data already exists
$doc_row  = getRow("documents", $uid, true);
//if no then create new data
if (!$doc_row) {
  $sql_create = "INSERT INTO documents (user)
  VALUES ('$uid')";
  if ($dbc->query($sql_create) === TRUE) {
    echo "New Document Table Created.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }
}
else{
  $c10 = $doc_row["c10"];
  $c12 = $doc_row["c12"];
  $ug = $doc_row["ug"];
  $pg = $doc_row["pg"];
  $net = $doc_row["net"];
  $other = $doc_row["other"];

  if($doc_row['c10'] && $doc_row['c12'] && $doc_row['ug'] && $doc_row['pg'] && $doc_row['net'] && $doc_row['other']) updateForm($uid, "documents");
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
          <a href="./documents.php" class="active list-group-item d-flex justify-content-between">
            <span>Upload Documents</span> 
            <?php
            if($myform['documents']) echo "<i class='ico-check text-white'></i>";
            else echo "<i class='ico-wrong text-white'></i>";
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
      <div class="col p-2">
        <b>Note:</b>
        <ul>
          <li>
            Upload file must be less than 300 KB
          </li>
          <li>If you do not upload relevent documents, your application may get rejected.</li>
        </ul>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name of the Document / Certificate</th>
              <th scope="col">View File</th>
              <th scope="col">Upload</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- 10th form -->
            <tr scope="col">
              <td>
                10th standard or equivalent
              </td>
              <td>
                <a target='_blank' href="<?php echo $c10 ?>">Click here to view the document</a>
              </td>

              <form action="documents.php" method='post' enctype="multipart/form-data">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" name="c10" required />
                </td>

                <td>
                  <input type="text" name="name" class='d-none' value='c10'>
                  <input class="btn btn-primary" type='submit' name='upload' value='Upload'>
                </td>
              </form>
            </tr>

            <!-- 12th form -->
            <tr scope="col">
              <td>
                12th standard or equivalent
              </td>
              <td>
                <a target='_blank' href="<?php echo $c12 ?>">Click here to view the document</a>
              </td>

              <form action="documents.php" method='post' enctype="multipart/form-data">
                <td>
                  <input name='c12' onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <input type="text" name="name" class='d-none' value='c12'>
                  <input class="btn btn-primary" type='submit' name='upload' value='Upload'>
                </td>
              </form>
            </tr>

            <!-- Undergraduate Form -->
            <tr scope="col">
              <td>
                Undergraduate
              </td>
              <td>
                <a target='_blank' href="<?php echo $ug ?>">Click here to view the document</a>
              </td>

              <form action="documents.php" method='post' enctype="multipart/form-data">
                <td>
                  <input name='ug' onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <input type="text" name="name" class='d-none' value='ug'>
                  <input class="btn btn-primary" type='submit' name='upload' value='Upload'>
                </td>
              </form>
            </tr>

            <!-- Postgraduate Form -->
            <tr scope="col">
              <td>
                Postgraduate
              </td>
              <td>
                <a target='_blank' href="<?php echo $pg ?>">Click here to view the document</a>
              </td>

              <form action="documents.php" method='post' enctype="multipart/form-data">
                <td>
                  <input name='pg' onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <input type="text" name="name" class='d-none' value='pg'>
                  <input class="btn btn-primary" type='submit' name='upload' value='Upload'>
                </td>
              </form>
            </tr>

            <!-- SET / SLET Form -->
            <tr scope="col">
              <td>
                NET / SLET / SET / GATE
              </td>
              <td>
                <a target='_blank' href="<?php echo $net ?>">Click here to view the document</a>
              </td>

              <form action="documents.php" method='post' enctype="multipart/form-data">
                <td>
                  <input name='net' onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <input type="text" name="name" class='d-none' value='net'>
                  <input class="btn btn-primary" type='submit' name='upload' value='Upload'>
                </td>
              </form>
            </tr>

            <!-- Other form -->
            <tr scope="col">
              <td>
                Other Degree
              </td>
              <td>
                <a target='_blank' href="<?php echo $other ?>">Click here to view the document</a>
              </td>

              <form action="documents.php" method='post' enctype="multipart/form-data">
                <td>
                  <input name='other' onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <input type="text" name="name" class='d-none' value='other'>
                  <input class="btn btn-primary" type='submit' name='upload' value='Upload'>
                </td>
              </form>
            </tr>
          </tbody>
        </table>

        <div class="text-center">
          <a href="./research.php" class="btn btn-primary">Continue</a>
        </div>
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