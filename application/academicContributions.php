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
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./academicContributions.php" class="list-group-item active">Research & Academic Contributions</a>
          <a href="./apiScore.php" class="list-group-item">API score</a>
          <a href="./otherDetails.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>

      <!-- Form Section -->
      <div class="col p-3">

        <h5>(A) Research Papers Published in referred Journals/Other reputed Journal as notified by the UGC (Category-III)</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title with Page No.</th>
              <th scope="col">Journal</th>
              <th scope="col">ISSN / ISBN No.</th>
              <th scope="col">Peer Reviewed / Impact Factor</th>
              <th scope="col">No. of Co-authors</th>
              <th scope="col">Authorship (Main author / Corresponding author)</th>
              <th scope="col">API score</th>
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
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Title with Page No *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title with page no." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Journal *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Journal" required />
                </td>
              </tr>

              <tr scope="row">
                <td>ISSN / ISBN No. *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter ISSN / ISBN No." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Peer Reviewed / Impact Factor (Provide UGC list no.) *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Peer Reviewed / Impact Factor" required />
                </td>
              </tr>

              <tr scope="row">
                <td>No. of Co-authors *</td>

                <td>
                  <input type="text" class="form-control" placeholder="No. of co-author" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Authorship (Main author / Corresponding author) *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Name of Author (Main / Corresponding)" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(B) Book(s) Published</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Book Title.</th>
              <th scope="col">Type of Authorship</th>
              <th scope="col">ISSN / ISBN No.</th>
              <th scope="col">Publisher</th>
              <th scope="col">Type of book</th>
              <th scope="col">Single / co-author</th>
              <th scope="col">API score</th>
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
              <td><a href="#">See your document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!--  Books Published Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Book Title *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Book Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Type of Authorship *</td>

                <td>
                  <select class="custom-select" required>
                    <option>Select Type</option>
                    <option value="Single">Single</option>
                    <option value="Joint">Joint</option>
                  </select>
                </td>
              </tr>

              <tr scope="row">
                <td>ISSN / ISBN No. *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter ISSN / ISBN No." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Publisher Type *</td>

                <td>
                  <select class="custom-select" required>
                    <option>Select Publisher</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="State">State</option>
                    <option value="Govt. Publisher">Govt. Publisher</option>
                  </select>
                </td>
              </tr>


              <tr scope="row">
                <td>Type Of Book *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Type Of Book. Example: Text, Reference, Subject etc." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Single / Co-author *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Single or Co-author" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(C) Research Projects</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title</th>
              <th scope="col">Agency</th>
              <th scope="col">Period</th>
              <th scope="col">Grand / Amount Sanctioned (Rs.)</th>
              <th scope="col">API score</th>
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
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Title *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Agency *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Agency Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Period *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Period" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Grand / Amount Sanctioned (Rs.) *</td>

                <td>
                  <input type="number" class="form-control" placeholder="Enter Grand / Amount" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(D) Research Guidance</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Course</th>
              <th scope="col">Number of student enrolled</th>
              <th scope="col">Thesis submitted</th>
              <th scope="col">Degree awarded</th>
              <th scope="col">API score</th>
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
              <td><a href="#">See your document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!-- Research Guidance Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Course *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Number of student enrolled *</td>

                <td>
                  <input type="number" class="form-control" placeholder="Enter Number of student enrolled" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Thesis Submitted *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Thesis Submitted" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Degree Awarded *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Degree Awarded" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(E) (a) Paper Presented in Confrences/Seminars</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title of Paper Presented</th>
              <th scope="col">Title of Confrence / Seminar etc.</th>
              <th scope="col">Organised By</th>
              <th scope="col">Weather of International / National / State / University Level</th>
              <th scope="col">API score</th>
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
              <td><a href="#">See your document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!--  Paper Presented in Confrences/Seminars Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Title of Paper Presented *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Title of Confrence / Seminar etc *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title of Confrence / Seminar etc" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organised By *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Organiser" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Weather of International / National / State / University Level *</td>

                <td>
                  <select class="custom-select" required>
                    <option>Select Level</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="State">State</option>
                    <option value="University">University</option>
                  </select>
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(E) (b) Invited Lectures in Confrences/Seminars</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title Of The Lecture</th>
              <th scope="col">Title of Confrence / Seminar etc.</th>
              <th scope="col">Organised By</th>
              <th scope="col">Weather of International / National / State / University Level</th>
              <th scope="col">API score</th>
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
              <td><a href="#">See your document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!--  Invited Lectures in Confrences/Seminars Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Title Of The Lecture *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Title of Confrence / Seminar etc *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Title of Confrence / Seminar etc" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organised By *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Organiser" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Weather of International / National / State / University Level *</td>

                <td>
                  <select class="custom-select" required>
                    <option>Select Level</option>
                    <option value="International">International</option>
                    <option value="National">National</option>
                    <option value="State">State</option>
                    <option value="University">University</option>
                  </select>
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(F) Development Of E-Learning Material</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Nature Of Activity</th>
              <th scope="col">Module Details</th>
              <th scope="col">Year</th>
              <th scope="col">API score</th>
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
              <td><a href="#">See your document here</a></td>
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!--  Development of E-learning Material Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Nature Of Activity *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Nature Of Activity" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Module Details *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Module Details" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year *</td>

                <td>
                  <input type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter API score" required />
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
          </div>
        </form>

        <hr />

        <h5>(G) Contribution in Corporate Life (if any)</h5>

        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Post Held</th>
              <th scope="col">Nature Of Work</th>
              <th scope="col">Year</th>
              <th scope="col">Organization / Institute</th>
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
              <td><button class="btn btn-danger">Delete</button></td>
            </tr>
          </tbody>
        </table>

        <!--  Development of E-learning Material Form -->
        <form class="mt-4" action="">
          <table class="table table-bordered mt-4">
            <thead>
              <tr>
                <th scope="col">Fields</th>
                <th scope="col">Details</th>
              </tr>
            </thead>

            <tbody>
              <tr scope="row">
                <td>Post Held *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Post Held" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Nature Of Work *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Nature Of Work" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year *</td>

                <td>
                  <input type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organization / Institute *</td>

                <td>
                  <input type="text" class="form-control" placeholder="Enter Organization / Institute" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit">Add</button>
          </div>
        </form>

        <hr>

        <div class="text-center">
          <a href="./apiScore.php" class="btn btn-primary">Continue</a>
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