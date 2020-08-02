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
          <a href="./uploadDocuments.php" class="list-group-item active">Upload Documents</a>
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
                <a href="#">Click here to view the document</a>
              </td>

              <form action="">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <button class="btn btn-primary">Upload</button>
                </td>
              </form>
            </tr>

            <!-- 12th form -->
            <tr scope="col">
              <td>
                12th standard or equivalent
              </td>
              <td>
                <a href="#">Click here to view the document</a>
              </td>

              <form action="">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <button class="btn btn-primary">Upload</button>
                </td>
              </form>
            </tr>

            <!-- Undergraduate Form -->
            <tr scope="col">
              <td>
                Undergraduate
              </td>
              <td>
                <a href="#">Click here to view the document</a>
              </td>

              <form action="">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <button class="btn btn-primary">Upload</button>
                </td>
              </form>
            </tr>

            <!-- Postgraduate Form -->
            <tr scope="col">
              <td>
                Postgraduate
              </td>
              <td>
                <a href="#">Click here to view the document</a>
              </td>

              <form action="">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <button class="btn btn-primary">Upload</button>
                </td>
              </form>
            </tr>

            <!-- SET / SLET Form -->
            <tr scope="col">
              <td>
                NET / SLET / SET / GATE
              </td>
              <td>
                <a href="#">Click here to view the document</a>
              </td>

              <form action="">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <button class="btn btn-primary">Upload</button>
                </td>
              </form>
            </tr>

            <!-- Other form -->
            <tr scope="col">
              <td>
                Other Degree
              </td>
              <td>
                <a href="#">Click here to view the document</a>
              </td>

              <form action="">
                <td>
                  <input onchange="validate()" type="file" accept="image/jpeg, image/jpg, image/png, application/pdf" required />
                </td>

                <td>
                  <button class="btn btn-primary">Upload</button>
                </td>
              </form>
            </tr>
          </tbody>
        </table>

        <div class="text-center">
          <a href="./researchDegree.php" class="btn btn-primary">Continue</a>
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