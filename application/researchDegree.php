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
          <a href="./researchDegree.php" class="list-group-item active">Research Degree</a>
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
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">SI No.</th>
              <th scope="col">Name of degree</th>
              <th scope="col">Title</th>
              <th scope="col">Date of Award of degree.</th>
              <th scope="col">Institution / University</th>
              <th scope="col">Encl. No.</th>
              <th scope="col"></th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace this section using javascript -->
            <tr scope="row">
              <td>1</td>
              <td>SET</td>
              <td>AAA</td>
              <td>2020</td>
              <td>Computer Science</td>
              <td>21012</td>
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
                <th scope="col">Research Degree</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Degree Name *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Degree Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Degree Title *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Degree title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year Of Award *</td>

                <td>
                  <input type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>University / Institution *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter University/Institution" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Encl. No.</td>
                <td>
                  <input type="text" class="form-control" placeholder="Enter Encl. No." />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit">Add</button>
            <a href="./uploadDocuments.php" class="btn btn-primary">Continue</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>