<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
  $_SESSION['email'] = "14sarthi@gmail.com";
}
$uid = $_SESSION['email'];
require_once('../database.php');


//if new data is posted 
if (isset($_POST["post"])) {

  //candidate data
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
  $user = $uid;

  //find existing candidate data
  $sql_ = "SELECT * FROM candidate WHERE user='$uid' LIMIT 1";
  $result_ = mysqli_query($dbc, $sql_);
  $count_  = mysqli_num_rows($result_);

  //if it exists then delete it before creating one
  if ($count_ > 0) {
    if ($dbc->query("DELETE FROM candidate WHERE user='$uid'") === TRUE) {
      echo "Candidate deleted successfully";
    } else {
      echo "Error deleting candidate: " . $conn->error;
    }
  }

  //insert new candidate data
  $sql = "INSERT INTO candidate (post, post_code, first_name, last_name, dob, gender, disability, father_name, mother_name, nationality, mother_tongue, languages, category, category_for, category_in, marital_status, user)
  VALUES ('$post', '$post_code', '$first_name', '$last_name', '$dob', '$gender', '$disability', '$father_name', '$mother_name', '$nationality', '$mother_tongue', '$languages', '$category', '$category_for', '$category_in', '$marital_status', '$user')";

  if ($dbc->query($sql) === TRUE) {
    echo "Candidate Saved.";
  } else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
  }

  //address data
  $address_one = $_POST["address_one"];
  $address_two = $_POST["address_two"];
  $address_three = $_POST["address_three"];
  $post_office = $_POST["post_office"];
  $police_station = $_POST["police_station"];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $district = $_POST["district"];
  $pin = $_POST["pin"];
  $parent_phone = $_POST["parent_phone"];
  $s_address_one = $_POST["s_address_one"];
  $s_address_two = $_POST["s_address_two"];
  $s_address_three = $_POST["s_address_three"];
  $s_post_office = $_POST["s_post_office"];
  $s_police_station = $_POST["s_police_station"];
  $s_country = $_POST["s_country"];
  $s_state = $_POST["s_state"];
  $s_district = $_POST["s_district"];
  $s_pin = $_POST["s_pin"];
  $s_parent_phone = $_POST["s_parent_phone"];
  $a_user = $uid;

  //find existing address data
  $s_sql_ = "SELECT * FROM address WHERE user='$uid' LIMIT 1";
  $s_result_ = mysqli_query($dbc, $s_sql_);
  $s_count_  = mysqli_num_rows($s_result_);

  //if it exists then delete it before creating one
  if ($s_count_ > 0) {
    if ($dbc->query("DELETE FROM address WHERE user='$uid'") === TRUE) {
      echo "Address deleted successfully";
    } else {
      echo "Error deleting address: " . $conn->error;
    }
  }

  //insert new address data
  $s_sql = "INSERT INTO address (user, address_one, s_address_one, address_two, s_address_two, address_three, s_address_three, post_office, s_post_office, police_station, s_police_station, country, s_country, state, s_state, district, s_district, pin, s_pin, parent_phone, s_parent_phone)
  VALUES ('$a_user', '$address_one', '$s_address_one', '$address_two', '$s_address_two', '$address_three', '$s_address_three', '$post_office', '$s_post_office', '$police_station', '$s_police_station', '$country', '$s_country', '$state', '$s_state', '$district', '$s_district', '$pin', '$s_pin', '$parent_phone', '$s_parent_phone')";

  if ($dbc->query($s_sql) === TRUE) {
    echo "Address Saved.";
  } else {
    echo "Error: " . $s_sql . "<br>" . $dbc->error;
  }
}

//get data to autofill if it exists
$photo_name = "default_photo.jpg";
$sign_name = "default_sign.png";

$sql = "SELECT * FROM photos WHERE user='$uid' LIMIT 1";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);
$count  = mysqli_num_rows($result);
if($count==0) {
  echo "No Photos Found!";
} else{
  //print_r($row);
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

        <form method="post" action="academicDetails.php" enctype="multipart/form-data">
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
            <button name="submit" type="submit" class="btn btn-primary text-white">Upload & Continue</button>
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