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
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./fields.php" class="list-group-item">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item active">Teaching, Learning & Evaluation related activities</a>
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
              <th scope="col">S.N.</th>
              <th scope="col">Name / Nature of the activity</th>
              <th scope="col">Duration</th>
              <th scope="col">Organising University / Institution</th>
              <th scope="col">API score</th>
              <th scope="col">Document</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#">See your document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!-- Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Activity Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Name / Nature of the activity *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Name / Nature of the activity" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Duration *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Duration" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organising University / Institution Name *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Organising University / Institution Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API Score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit">Add</button>
            <a href="./academicContributions.php" class="btn btn-primary">Continue</a>
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