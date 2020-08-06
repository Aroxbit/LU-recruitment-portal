<?php
session_start();
$asset_dir = "./uploads/";
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');

//get existing data
function readData($table_name, $one){
  global $dbc;
  $uid = $_SESSION['email'];
  $sql = "SELECT * FROM " . $table_name . " WHERE user='$uid'";
  if($table_name === 'users') $sql = "SELECT * FROM " . $table_name . " WHERE email='$uid'";
  if($one) $sql = $sql . " LIMIT 1";
  $result = mysqli_query($dbc, $sql);
  if ($one){
     $row = mysqli_fetch_assoc($result);
     return $row;
    }
  return $result;
}

//user data
$user_row = readData("users", true);

// candidate
$candidate_row = readData("candidate", true);
$address_row = readData("address", true);

// photo_sign TODO: change table name
$photo_sign_row = readData("photos", true);

// academic details
$academic_row = readData("academic", true);

// net
$net_table = readData("net", false);

// document TODO: change table name
$document_row = readData("documents", true);

// research
$research_table = readData("research", false);

// award TODO: change table name
$award_table = readData("awards", false);

// employment
$employment_table = readData("employment", false);
$employment_data_row = readData("employment", true);

// specialization
$specialization_row = readData("specialization", true);

// teaching TODO: change table name
$teaching_table = readData("evaluation", false);

//Research & Academic Contributions
$table_a = readData("rac_a", false);
$table_b = readData("rac_b", false);
$table_c = readData("rac_c", false);
$table_d = readData("rac_d", false);
$table_e1 = readData("rac_e1", false);
$table_e2 = readData("rac_e2", false);
$table_f = readData("rac_f", false);
$table_g = readData("rac_g", false);

// score
$score_row = readData("score", true);

//other
$other_table = readData("other", false);



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./src/main.css" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <title>Lucknow University Recruitment Portal</title>
  </head>

  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-light border-bottom">
      <div class="navbar-brand">
        Application No. <?php echo $candidate_row['id'] ?>
      </div>

      <div class="inline-flex">
        <a href="./index.php" class="d-block">
          <!-- Desktop Logo-->
          <img
            class="d-none d-md-block"
            src="../assets/logo.png"
            alt="Logo"
            width="300"
          />

          <!-- Mobile Logo -->
          <img
            class="d-sm-block d-md-none"
            src="../assets/LU_Logo.png"
            alt="Lucknow University Logo"
            width="100"
          />
        </a>
      </div>

      <div class="inline-flex p-1">
        <img
          class="d-block mb-2"
          src="<?php echo $asset_dir . $photo_sign_row['photo'] ?>"
          alt=""
          height="120"
          width="120"
        />
        <img
          class="d-block"
          src="<?php echo $asset_dir . $photo_sign_row['sign'] ?>"
          alt=""
          height="50"
          width="120"
        />
      </div>
    </nav>

    <div class="container-fluid mt-4 border-bottom">
      <div class="text-center mb-3">
        <b>
          <u>
            Application Form For Appointment To The Post Of <?php echo $candidate_row["post"] ?>, (Post
            Code: <?php echo $candidate_row["post_code"] ?>).
          </u>
        </b>
      </div>

      <!-- Candidate Details Section here -->
      <div class="row border-bottom mb-3">
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">1. Name:</th>
              <td><?php echo $candidate_row["first_name"] ." ". $candidate_row["last_name"] ?></td>

              <th scope="row">2. Post applied for:</th>
              <td><?php echo $candidate_row["post"] ?></td>
            </tr>

            <tr>
              <th scope="row">3. Gender:</th>
              <td><?php echo $candidate_row["gender"] ?></td>

              <th scope="row">4. Category:</th>
              <td><?php echo $candidate_row["category"] ?></td>
            </tr>

            <tr>
              <th scope="row">5. Category Applied For:</th>
              <td><?php echo $candidate_row["category_for"] ?></td>

              <th scope="row">6. Date Of Birth:</th>
              <td><?php echo $candidate_row["dob"] ?></td>
            </tr>

            <tr>
              <th scope="row">7. Father's Name:</th>
              <td><?php echo $candidate_row["father_name"] ?></td>

              <th scope="row">8. Mobile:</th>
              <td><?php echo $user_row["phone"] ?></td>
            </tr>

            <tr>
              <th scope="row">9. Mother's Name:</th>
              <td><?php echo $candidate_row["mother_name"] ?></td>

              <th scope="row">10. Email :</th>
              <td><?php echo $user_row["email"] ?></td>
            </tr>

            <tr>
              <th scope="row">11. Marital Status:</th>
              <td><?php echo $candidate_row["marital_status"] ?></td>

              <th scope="row">12. Consider in General Category:</th>
              <td><?php echo $candidate_row["category_in"] ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Candidate Correspondance Address -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          13. Correspondance Address:
        </h6>
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">House No./ Street / Area:</th>
              <td><?php echo $address_row["address_one"] ?></td>

              <th scope="row">Block / Municipality:</th>
              <td><?php echo $address_row["address_two"] ?></td>
            </tr>

            <tr>
              <th scope="row">City/Town/Village:</th>
              <td><?php echo $address_row["address_three"] ?></td>

              <th scope="row">Post Office:</th>
              <td><?php echo $address_row["post_office"] ?></td>
            </tr>

            <tr>
              <th scope="row">Police Station:</th>
              <td><?php echo $address_row["police_station"] ?></td>

              <th scope="row">Country:</th>
              <td><?php echo $address_row["country"] ?></td>
            </tr>

            <tr>
              <th scope="row">State:</th>
              <td><?php echo $address_row["state"] ?></td>

              <th scope="row">District:</th>
              <td><?php echo $address_row["district"] ?></td>
            </tr>

            <tr>
              <th scope="row">PIN:</th>
              <td><?php echo $address_row["pin"] ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Candidate's Permanent Address -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          14. Permanent Address:
        </h6>
        <table class="table">
          <tbody>
          <tr>
              <th scope="row">House No./ Street / Area:</th>
              <td><?php echo $address_row["s_address_one"] ?></td>

              <th scope="row">Block / Municipality:</th>
              <td><?php echo $address_row["s_address_two"] ?></td>
            </tr>

            <tr>
              <th scope="row">City/Town/Village:</th>
              <td><?php echo $address_row["s_address_three"] ?></td>

              <th scope="row">Post Office:</th>
              <td><?php echo $address_row["s_post_office"] ?></td>
            </tr>

            <tr>
              <th scope="row">Police Station:</th>
              <td><?php echo $address_row["s_police_station"] ?></td>

              <th scope="row">Country:</th>
              <td><?php echo $address_row["s_country"] ?></td>
            </tr>

            <tr>
              <th scope="row">State:</th>
              <td><?php echo $address_row["s_state"] ?></td>

              <th scope="row">District:</th>
              <td><?php echo $address_row["s_district"] ?></td>
            </tr>

            <tr>
              <th scope="row">PIN:</th>
              <td><?php echo $address_row["s_pin"] ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Academic Details -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          15. Academic Details:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Name Of The Examination</th>
              <th>Subject</th>
              <th>Board / University</th>
              <th>Year Of Passing</th>
              <th>Division</th>
              <th>Percentage</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>10th Standard Or Equivalent</td>
              <td></td>
              <td><?php echo $academic_row["c10_name"] ?></td>
              <td><?php echo $academic_row["c10_year"] ?></td>
              <td><?php echo $academic_row["c10_grade"] ?></td>
              <td><?php echo $academic_row["c10_per"] ?></td>
            </tr>

            <tr>
              <td>12th Standard Or Equivalent</td>
              <td></td>
              <td><?php echo $academic_row["c12_name"] ?></td>
              <td><?php echo $academic_row["c12_year"] ?></td>
              <td><?php echo $academic_row["c12_grade"] ?></td>
              <td><?php echo $academic_row["c12_per"] ?></td>
            </tr>

            <tr>
              <td>Batchlor Degree Name here</td>
              <td><?php echo $academic_row["ug_subject"] ?></td>
              <td><?php echo $academic_row["ug_name"] ?></td>
              <td><?php echo $academic_row["ug_year"] ?></td>
              <td><?php echo $academic_row["ug_grade"] ?></td>
              <td><?php echo $academic_row["ug_per"] ?></td>
            </tr>

            <tr>
              <td>Master Degree Name here</td>
              <td><?php echo $academic_row["m_subject"] ?></td>
              <td><?php echo $academic_row["m_name"] ?></td>
              <td><?php echo $academic_row["m_year"] ?></td>
              <td><?php echo $academic_row["m_grade"] ?></td>
              <td><?php echo $academic_row["m_per"] ?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- NET SLET SET GATE -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          16. NET / SLET / SET / GATE:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>S.N.</th>
              <th>Type</th>
              <th>Agency</th>
              <th>Year Of Award</th>
              <th>Subject</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <?php
              $net_i = 1;
              while($net_row = mysqli_fetch_assoc($net_table)){
                echo "<tr scope='row'>";
                echo "<td>" . $net_i . "</td>";
                echo "<td>" . $net_row["type"] . "</td>";
                echo "<td>" . $net_row["agency"] . "</td>";
                echo "<td>" . $net_row["year"] . "</td>";
                echo "<td>" . $net_row["subject"] . "</td>";
                $net_i = $net_i+1;
              }
            ?>
          </tbody>
        </table>
      </div>

      <!-- RESEARCH DEGREE -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          17. Research Degree:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">SI No.</th>
              <th scope="col">Name of degree</th>
              <th scope="col">Title</th>
              <th scope="col">Date of Award of degree.</th>
              <th scope="col">Institution / University</th>
              <th scope="col">Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td>SET</td>
              <td>AAA</td>
              <td>2020</td>
              <td>Computer Science</td>
              <td><a href="#">See your Document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- FELLOWSHIP/AWARDS -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          18. Fellowship / Awards:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">SI No.</th>
              <th scope="col">Fellowship / Award Name</th>
              <th scope="col">Level</th>
              <th scope="col">Name of Academic Body / Association</th>
              <th scope="col">Year</th>
              <th scope="col">API score</th>
              <th scope="col">Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td>Award Name</td>
              <td>Level</td>
              <td>Academic Body Name</td>
              <td>2018</td>
              <td>API Score here</td>
              <td><a href="#">See your Document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- EMPLOYMENT DETAILS -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          19. Employment Details:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S. N.</th>
              <th scope="col">Designation</th>
              <th scope="col">Nature Of Job / Post</th>
              <th scope="col">Date Joined</th>
              <th scope="col">Date Left</th>
              <th scope="col">Pay Scale / Brand with Grade Pay</th>
              <th scope="col">Reason for leaving</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td>Designation Name</td>
              <td>Govt.</td>
              <td>2010</td>
              <td>2018</td>
              <td>250000</td>
              <td>Low pay</td>
              <td><a href="#">See your Document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- TEACHING -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          20. Teaching, Learning & Evaluation related activities:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Name / Nature of the activity</th>
              <th scope="col">Duration</th>
              <th scope="col">Organising University / Institution</th>
              <th scope="col">API score</th>
              <th scope="col">Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td>Designation Name</td>
              <td>Govt.</td>
              <td>2010</td>
              <td>2018</td>
              <td><a href="#">See your Document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_A RESEARCH PAPERS -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          21. Research Papers Published in referred Journals/Other reputed
          Journal as notified by the UGC (Category-III):
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title with Page No.</th>
              <th scope="col">Journal</th>
              <th scope="col">ISSN / ISBN No.</th>
              <th scope="col">Peer Reviewed / Impact Factor</th>
              <th scope="col">No. of Co-authors</th>
              <th scope="col">
                Authorship (Main author / Corresponding author)
              </th>
              <th scope="col">API score</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
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
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_B BOOKS PUBLISHED -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          22. Book(s) Published:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
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
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
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
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_C RESEARCH PROJECTS -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          23. Research Projects:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title</th>
              <th scope="col">Agency</th>
              <th scope="col">Period</th>
              <th scope="col">Grand / Amount Sanctioned (Rs.)</th>
              <th scope="col">API score</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#">See your document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_D RESEARCH GUIDANCE -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          24. Research Guidance:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Course</th>
              <th scope="col">Number of student enrolled</th>
              <th scope="col">Thesis submitted</th>
              <th scope="col">Degree awarded</th>
              <th scope="col">API score</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#">See your document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_E1 PAPER PRESENTED IN CONFRENCE/SEMINARS -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          25. Paper Presented in Confrences/Seminars:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title of Paper Presented</th>
              <th scope="col">Title of Confrence / Seminar etc.</th>
              <th scope="col">Organised By</th>
              <th scope="col">
                Weather of International / National / State / University Level
              </th>
              <th scope="col">API score</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#">See your document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_E2 Invited lecture in confrence and seminar -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          26. Invited Lectures in Confrences/Seminars:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Title Of The Lecture</th>
              <th scope="col">Title of Confrence / Seminar etc.</th>
              <th scope="col">Organised By</th>
              <th scope="col">
                Weather of International / National / State / University Level
              </th>
              <th scope="col">API score</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#">See your document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_F Development of e-learning material -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          27. Development Of E-Learning Material:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Nature Of Activity</th>
              <th scope="col">Module Details</th>
              <th scope="col">Year</th>
              <th scope="col">API score</th>
              <th scope="col">Relevent Document</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><a href="#">See your document here</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- RAC_G Contribution in corporate life -->
      <div class="row border-bottom mb-3">
        <h6 class="w-100 bg-dark text-white pt-3 pb-3 pl-2">
          28. Contribution in Corporate Life:
        </h6>
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">S.N.</th>
              <th scope="col">Post Held</th>
              <th scope="col">Nature Of Work</th>
              <th scope="col">Year</th>
              <th scope="col">Organization / Institute</th>
            </tr>
          </thead>

          <tbody>
            <!-- Replace here using php -->
            <tr scope="row">
              <td>1</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>

      <p>You won't be able to edit the form if you continue.</p>

      <div class="text-center mb-2">
        <button class="btn btn-primary">Accept & Continue</button>
      </div>
    </div>

    <footer class="text-center pt-4 pb-4">
      © 2020 Lucknow University
    </footer>
  </body>
</html>
