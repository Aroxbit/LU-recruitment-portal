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
          <a href="#" class="list-group-item">Academic Details</a>
          <a href="#" class="list-group-item">NET / SLET / SET / GATE</a>
          <a href="#" class="list-group-item">Upload Documents</a>
          <a href="#" class="list-group-item">Research Degree</a>
          <a href="#" class="list-group-item">Fellowship / Awards</a>
          <a href="#" class="list-group-item">Employment Details</a>
          <a href="#" class="list-group-item">Field Of Specialization</a>
          <a href="#" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="#" class="list-group-item">Research & Academic Contributions</a>
          <a href="#" class="list-group-item">API score</a>
          <a href="#" class="list-group-item">Other Details</a>
          <a href="#" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col">
        <div class="d-flex p-2 align-items-center">
          <!-- Post applying for -->
          <h4>Assistant Professor</h4>
          <div class="ml-2">(Post Code: 012122)</div>
        </div>

        <div class="d-flex justify-content-center">

          <form method="" action="" class="mt-3 p-3">
            <div class="form-group">
              <label>Candidate Name *</label>
              <div class="form-row">
                <div class="col">
                  <input name="fname" type="text" class="form-control" placeholder="First name" required />
                </div>
                <div class="col">
                  <input name="mname" type="text" class="form-control" placeholder="Middle name" />
                </div>
                <div class="col">
                  <input name="lname" type="text" class="form-control" placeholder="Last name" required />
                </div>
              </div>
              <small class="form-text text-muted">
                In capital letters only.
              </small>
            </div>

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