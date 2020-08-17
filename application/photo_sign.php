<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  $_SESSION['email'] = "14sarthi@gmail.com";
}
$uid = $_SESSION['email'];
require_once('../database.php');
canEdit($uid);


// if file is uploaded
if(isset($_POST["submit"])){
  $photo_name = upload($uid, "photo");
  $sign_name = upload($uid, "sign");

  $sql = "INSERT INTO photo_sign (photo, sign, user)
  VALUES ('$photo_name', '$sign_name', '$uid')";
  updateRow("photo_sign", $uid, $sql);
  updateForm($uid, 'photo_sign'); // update the form
  header("Location: academic.php");
}


//get data to autofill if it exists
$photo_name = "default_photo.jpg";
$sign_name = "default_sign.png";

// fetch the photo and sign data
$row = getRow("photo_sign", $uid, true);
if($row) {
  $photo_name = $row["photo"];
  $sign_name = $row["sign"];
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
          <a href="./photo_sign.php" class="active list-group-item d-flex justify-content-between">
            <span>Photo & Signature</span> 
            <?php
            if($myform['photo_sign']) echo "<i class='ico-check text-white'></i>";
            else echo "<i class='ico-wrong text-white'></i>";
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
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./rac.php" class="list-group-item">Research & Academic Contributions</a>
          <a href="./score.php" class="list-group-item">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col">

        <form method="post" action="photo_sign.php" enctype="multipart/form-data">
          <div class="row width-100">

            <div class="mt-3 p-3 col text-center">
              <h5 class="mb-3">Upload Photo</h5>

              <!-- Uploaded Image -->
              <img id="photo-preview" class="border" src="./uploads/<?php echo $photo_name ?>" alt="Passport Size Photo" width="120" height="150">

              <div class="form-group mt-2">
                <!-- Input for Photo upload -->
                <label for="photo-input">Passport Size Photo, colour Photo. Upload size must be less than 100 KB</label>
                <input onchange="handlePhotoValidation()" type="file" accept="image/*" class="form-control-file" id="photo-input" name="photo" required>
              </div>
            </div>

            <div class="mt-3 p-3 col text-center">
              <h5 class="mb-3">Upload Signature *</h5>
              <!-- Signature preview -->
              <img id="signature-preview" class="border" src="./uploads/<?php echo $sign_name ?>" alt="Signature" width="300" height="150">

              <!-- Input for Signature upload -->
              <div class="form-group mt-2">
                <label for="photo-input">Upload size must be less than 50 KB</label>
                <input onchange="handleSignatureValidation()" type="file" class="form-control-file" id="photo-input" name="sign" required>
              </div>

            </div>
          </div>

          <div class="text-center mt-4">
            <button name="submit" type="submit" class="btn btn-warning">Upload</button>
            <a href="./academic.php" class="btn btn-primary">Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script>
  // Allows Preview of the image
  function handlePhotoValidation() {
    let input = event.target;

    if (input.files[0].size > 100000) {
      alert("Image size cannot be more than 100 KB.");
      input.value = "";

    } else {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('photo-preview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
  }

  function handleSignatureValidation() {
    let input = event.target;

    if (input.files[0].size > 50000) {
      alert("Image size cannot be more than 50 KB.");
      input.value = "";

    } else {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('signature-preview').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
  }
</script>

</html>