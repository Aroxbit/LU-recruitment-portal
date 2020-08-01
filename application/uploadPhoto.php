<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}

$uid = $_SESSION['email'];


if(isset($_POST["post"])){
  $post = $_POST["post"]; 
  $post_code = $_POST["post_code"]; 
  $first_name = $_POST["first_name"]; 
  $last_name = $_POST["last_name"]; 
  $dob = $_POST["dob"]; 
  $gender = $_POST["gender"]; 
  $disability = $_POST["disability"]; 
  $father_name = $_POST["father_name"]; 
  $mother_name = $_POST["mother_name"]; 
  $nationality = $_POST["nationality"]; 
  $mother_tongue = $_POST["mother_tongue"]; 
  $languages = $_POST["languages"]; 
  $category = $_POST["category"]; 
  $category_for = $_POST["category_for"]; 
  $category_in = $_POST["category_in"]; 
  $marital_status = $_POST["marital_status"]; 
  $user = $_SESSION["email"];


  require_once('../database.php');

  $sql_ = "SELECT * FROM candidate WHERE user='$uid' LIMIT 1";
  $result_ = mysqli_query($dbc, $sql_);
  $count_  = mysqli_num_rows($result_);
  if($count_ > 0) {
    if ($dbc->query("DELETE FROM candidate WHERE user='$uid'") === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }

  $sql = "INSERT INTO candidate (post, post_code, first_name, last_name, dob, gender, disability, father_name, mother_name, nationality, mother_tongue, languages, category, category_for, category_in, marital_status, user)
  VALUES ('$post', '$post_code', '$first_name', '$last_name', '$dob', '$gender', '$disability', '$father_name', '$mother_name', '$nationality', '$mother_tongue', '$languages', '$category', '$category_for', '$category_in', '$marital_status', '$user')";

  if ($dbc->query($sql) === TRUE) {
    echo "Saved.";
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
          <a href="./uploadPhoto.php" class="list-group-item active">Upload Photo And Signature</a>
          <a href="./academicDetails.php" class="list-group-item">Academic Details</a>
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
        <div class="d-flex p-2 align-items-center">
          <!-- Post applying for -->
          <h4>Assistant Professor</h4>
          <div class="ml-2">(Post Code: 012122)</div>
        </div>


        <div class="row width-100">

          <form method="" action="" class="mt-3 p-3 col text-center">

            <h5 class="mb-3">Upload Photo</h5>

            <!-- Uploaded Image -->
            <img id="photo-preview" class="border" src="../assets/img-placeholder.jpg" alt="Passport Size Photo" width="120" height="150">


            <div class="form-group mt-2">
              <label for="photo-input">Passport Size Photo, colour Photo. Upload size must be less than 100 KB</label>
              <input onchange="handlePhotoValidation()" type="file" accept="image/*" class="form-control-file" id="photo-input" required>
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>

          <form method="" action="" class="mt-3 p-3 col text-center">


            <h5 class="mb-3">Upload Signature</h5>

            <img id="signature-preview" class="border" src="../assets/signature-placeholder.png" alt="Signature" width="300" height="150">

            <div class="form-group mt-2">
              <label for="photo-input">Passport Size Photo, colour Photo. Upload size must be less than 50 KB</label>
              <input onchange="handleSignatureValidation()" type="file" class="form-control-file" id="photo-input" required>
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
        </div>
        <hr />
        <div class="text-center mt-4">
          <a class="btn btn-primary text-white">Continue</a>
        </div>
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