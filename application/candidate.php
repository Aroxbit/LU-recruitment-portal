<?php
session_start();

if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}

$post = "";
$post_code = "";
$first_name = "";
$last_name = "";
$dob = "";
$gender = "";
$disability = "";
$father_name = "";
$mother_name = "";
$nationality = "";
$mother_tongue = "";
$languages = "";
$category = "";
$category_for = "";
$category_in = "";
$marital_status = "";


require_once('../database.php');
$sql = "SELECT * FROM candidate WHERE user='14sarthi@gmail.com' LIMIT 1";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);
$count  = mysqli_num_rows($result);
if($count==0) {
  echo "Nothing found!";
} else{
  print_r($row);

  $post = $row["post"]; 
  $post_code = $row["post_code"]; 
  $first_name = $row["first_name"]; 
  $last_name = $row["last_name"]; 
  $dob = $row["dob"]; 
  $gender = $row["gender"]; 
  $disability = $row["disability"]; 
  $father_name = $row["father_name"]; 
  $mother_name = $row["mother_name"]; 
  $nationality = $row["nationality"]; 
  $mother_tongue = $row["mother_tongue"]; 
  $languages = $row["languages"]; 
  $category = $row["category"]; 
  $category_for = $row["category_for"]; 
  $category_in = $row["category_in"]; 
  $marital_status = $row["marital_status"];
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
          <a href="./candidate.php" class="list-group-item active">Candidate Details</a>
          <a href="./uploadPhoto.php" class="list-group-item">Upload Photo And Signature</a>
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
        <div class="d-flex justify-content-center">

          <form method="post" action="uploadPhoto.php" class="mt-3 p-3 w-75">
            <label>Post</label>

            <select name="post" class="form-control mb-2 mr-sm-2" required>
              <option value="">Select Post</option>
              <option value="Assistant Professor">Assistant Professor</option>
              <option value="Associate Professor">Associate Professor</option>
              <option value="Professor">Professor</option>
            </select>

            <div class="form-group">
              <label for="Post Code">Post Code</label>
              <input name="post_code" class="form-control" type="text" name="Post Code" placeholder="Enter Post Code"/>
            </div>

            <div class="form-group">
              <label>Candidate Name *</label>
              <div class="form-row">
                <div class="col">
                  <input name="first_name" type="text" class="form-control" placeholder="First name" required  value="<?php echo $first_name ?>"/>
                </div>
                <div class="col">
                  <input name="last_name" type="text" class="form-control" placeholder="Last name" required />
                </div>
              </div>
              <small class="form-text text-muted">
                In capital letters only.
              </small>
            </div>

            <div class="form-group">
              <label>Date Of Birth (As recorded in High School or equivalent Certificate) *</label>
              <input name="dob" class="form-control" type="date" required value="<?php echo $dob ?>"/>
            </div>

            <div class="form-group">
              <label>Gender *</label>
              <select name="gender" class="form-control" required value="male">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div class="form-group">
              <label>Physical Disability, if any</label>
              <input name="disability" class="form-control" type="text" placeholder="Enter Disabilities" />
            </div>

            <div class="form-group">
              <label>Father's Name</label>
              <input name="father_name" class="form-control" type="text" placeholder="Father's Name" />
              <small class="form-text text-muted">
                In capital letters only.
              </small>
            </div>

            <div class="form-group">
              <label>Mother's Name</label>
              <input name="mother_name" class="form-control" type="text" placeholder="Mother's Name" />
              <small class="form-text text-muted">
                In capital letters only.
              </small>
            </div>

            <div class="form-group">
              <label>Nationality *</label>
              <input name="nationality" class="form-control" type="text" placeholder="Enter Nationality" required />
            </div>

            <div class="form-group">
              <label>Applicant's mother tongue *</label>
              <input name="mother_tongue" class="form-control" type="text" placeholder="Enter Mother Tongue" required />
            </div>

            <div class="form-group">
              <label>What other languages can the applicant fluenty speak, read, write, (sperate using comma) *</label>
              <input name="languages" class="form-control" type="text" placeholder="Enter Languages" />
            </div>

            <div class="form-group">
              <label>Category *</label>
              <select name="category" class="form-control" required>
                <option>Select Category</option>
                <option value="General">General</option>
                <option value="OBC">OBC</option>
                <option value="OBC">SC/ST</option>
              </select>
            </div>

            <div class="form-group">
              <label>Category Applied For *</label>
              <select name="category_for" class="form-control" required>
                <option>Select Category Applying For</option>
                <option value="R">R</option>
                <option value="UR">UR</option>
              </select>
            </div>

            <div class="form-group">
              <label>Category In General Category *</label>
              <select name="category_in" class="form-control" required>
                <option>Select Consider In General Category</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>

            <!-- Marital Status -->
            <div class="form-group">
              <label>Marital Status *</label>
              <select name="marital_status" class="form-control" required>
                <option>Select Marital Status</option>
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
              </select>
            </div>

            <hr class="mt-4" />

            <!-- Address section -->
            <h4>Permanent Address</h4>

            <div class="form-group">
              <label>House no./Street/Area</label>
              <input class="form-control" type="text" placeholder="Address Line 1" />
            </div>

            <div class="form-group">
              <label>Block/Municipality</label>
              <input class="form-control" type="text" placeholder="Address Line 2" />
            </div>

            <div class="form-group">
              <label>City/Town/Village</label>
              <input class="form-control" type="text" placeholder="Address Line 3" />
            </div>

            <div class="form-group">
              <label>Post Office</label>
              <input class="form-control" type="text" placeholder="Post Office" />
            </div>

            <div class="form-group">
              <label>Police Station</label>
              <input class="form-control" type="text" placeholder="Police Station" />
            </div>

            <div class="form-group">
              <label>Country</label>
              <input class="form-control" type="text" placeholder="Country" />
            </div>

            <div class="form-group">
              <label>State</label>
              <input class="form-control" type="text" placeholder="State" />
            </div>

            <div class="form-group">
              <label>District</label>
              <input class="form-control" type="text" placeholder="District" />
            </div>

            <div class="form-group">
              <label>PIN</label>
              <input class="form-control" type="text" placeholder="PIN" />
            </div>

            <div class="form-group">
              <label>Father/Guardian's Mobile Number</label>
              <input class="form-control" type="number" placeholder="Enter Mobile Number" />
            </div>

            <div class="inline-form">
              <label>Landline Phone</label>
              <div class="form-row">
                <div class="col-3">
                  <input type="number" class="form-control" placeholder="STD" />
                </div>
                <div class="col">
                  <input type="number" class="form-control" placeholder="Number" />
                </div>
              </div>
            </div>

            <hr class="mt-4" />


            <h4>Correspondence Address</h4>
            <!-- Checkbox if same as permanent Address -->
            <div class="form-check form-check-inline mb-3">
              <input class="form-check-input" type="checkbox" id="Correspondence Address" value="">
              <label class="form-check-label" for="Correspondence Address">Same as Permanent Address</label>
            </div>

            <div class="form-group">
              <label>House no/Street/Area</label>
              <input class="form-control" type="text" placeholder="Address Line 1" />
            </div>

            <div class="form-group">
              <label>Block/Municipality</label>
              <input class="form-control" type="text" placeholder="Address Line 2" />
            </div>

            <div class="form-group">
              <label>City/Town/Village</label>
              <input class="form-control" type="text" placeholder="Address Line 3" />
            </div>

            <div class="form-group">
              <label>Post Office</label>
              <input class="form-control" type="text" placeholder="Post Office" />
            </div>

            <div class="form-group">
              <label>Police Station</label>
              <input class="form-control" type="text" placeholder="Police Station" />
            </div>

            <div class="form-group">
              <label>Country</label>
              <input class="form-control" type="text" placeholder="Country" />
            </div>

            <div class="form-group">
              <label>State</label>
              <input class="form-control" type="text" placeholder="State" />
            </div>

            <div class="form-group">
              <label>District</label>
              <input class="form-control" type="text" placeholder="District" />
            </div>

            <div class="form-group">
              <label>PIN</label>
              <input class="form-control" type="text" placeholder="PIN" />
            </div>

            <div class="form-group">
              <label>Father/Guardian's Mobile Number</label>
              <input class="form-control" type="number" placeholder="Enter Mobile Number" />
            </div>

            <div class="inline-form">
              <label>Landline Phone</label>
              <div class="form-row">
                <div class="col-3">
                  <input type="number" class="form-control" placeholder="STD" />
                </div>
                <div class="col">
                  <input type="number" class="form-control" placeholder="Number" />
                </div>
              </div>
            </div>

            <hr class="mt-4">

            <!-- Email and phone number -->
            <div class="form-group">
              <div>Email: email@example.com</div>
              <div class="mt-1">Phone: 02909213901</div>
            </div>
            <p class="text-center">
            </p>

            <div class="text-center mt-3 mb-5">
              <button class="btn btn-primary" type="submit">Save & Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>