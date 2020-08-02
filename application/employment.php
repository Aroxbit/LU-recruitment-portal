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
          <a href="./employment.php" class="list-group-item active">Employment Details</a>
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
              <th scope="col">S. N.</th>
              <th scope="col">Designation</th>
              <th scope="col">Nature Of Job / Post</th>
              <th scope="col">Date Joined</th>
              <th scope="col">Date Left</th>
              <th scope="col">Pay Scale / Brand with Grade Pay</th>
              <th scope="col">Reason for leaving</th>
              <th scope="col">Relevent Document</th>
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
              <td></td>
              <td></td>
              <td></td>
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
                <th scope="col">Employment Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Designation *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Designation" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Nature Of Job / Post *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Example: Permanent, Temporary">
                </td>
              </tr>

              <tr scope="row">
                <td>Date Joined *</td>

                <td>
                  <input type="date" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Date Left *</td>

                <td>
                  <input type="date" class="form-control" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Pay Scale / Brand with Grade Pay *</td>

                <td>
                  <input type="number" class="form-control" placeholder="Enter Pay Scale" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Reason for leaving *</td>

                <td>
                  <textarea type="text" class="form-control" placeholder="Enter reason for leaving" required></textarea>
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max size 300 KB) *</td>
                <td>
                  <input onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit">Add</button>
          </div>
        </form>


        <!-- Form for teaching experience -->
        <form class="form" action="">
          <div class="inline-form">
            <label>Teaching Experience (In Years)</label>
            <div class="form-row">
              <div class="col-3">Undergraduate Classes:</div>
              <div class="col">
                <input type="number" class="form-control" placeholder="Year" />
              </div>
              <div class="p-1">to</div>
              <div class="col">
                <input type="number" class="form-control" placeholder="Year" />
              </div>
            </div>

            <div class="form-row mt-3">
              <div class="col-3">Postgraduate Classes:</div>
              <div class="col">
                <input type="number" class="form-control" placeholder="Year" />
              </div>
              <div class="p-1">to</div>
              <div class="col">
                <input type="number" class="form-control" placeholder="Year" />
              </div>
            </div>
          </div>

          <hr />

          <div class="inline-form">
            <div class="form-row">
              <label class="col-3">Research Experience (In Years): </label>
              <div class="col">
                <input type="number" class="form-control" placeholder="Year" />
              </div>
              <div class="p-1">to</div>
              <div class="col">
                <input type="number" class="form-control" placeholder="Year" />
              </div>
            </div>
          </div>
        </form>

        <hr />

        <div class="text-center mb-4">
          <a href="#" class="btn btn-primary">Save & Continue</a>
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