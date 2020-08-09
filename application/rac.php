<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: index.php");
}
$uid = $_SESSION['email'];
require_once('../database.php');


//when add button is pressed
function createData($sql){
  global $dbc;
  if (!($dbc->query($sql) === TRUE)) {
    echo "Error: " . $sql . "<br>" . $dbc->error;
    die();
  }
}

//remove data from a table
function removeData(){
  global $dbc;
  $id = $_POST["id"];
  $table = $_POST["table"];
  $sql = "DELETE FROM " . $table . " WHERE id='$id'";
  $dbc->query($sql);
}

//get existing data
function readData($table_name){
  global $dbc;
  $uid = $_SESSION['email'];
  $sql = "SELECT * FROM " . $table_name . " WHERE user='$uid'";
  $result = mysqli_query($dbc, $sql);
  // if (mysqli_num_rows($result)) echo "Hello!";
  return $result;
}

//upload file if it exists on form
$my_doc = "nill";
if(isset($_POST["score"])){
  $my_doc = upload($uid, "new_document");
}

// delete button pressed
if(isset($_POST['del'])) removeData();

//create data based on which form has been submitted
if(isset($_POST["add_a"])) {
  $sql_a = "INSERT INTO rac_a (title, journal, isbn, peer, author, authorship, score, document, user)
  VALUES ('{$_POST['title']}', '{$_POST['journal']}', '{$_POST['isbn']}', '{$_POST['peer']}', '{$_POST['author']}', 
  '{$_POST['authorship']}', '{$_POST['score']}', '$my_doc', '{$_SESSION['email']}')";
  createData($sql_a);
}

if(isset($_POST["add_b"])){
  $sql_b = "INSERT INTO rac_b (title, publisher, isbn, type, single, authorship, score, document, user)
  VALUES ('{$_POST["title"]}', '{$_POST["publisher"]}', '{$_POST["isbn"]}', '{$_POST["type"]}', '{$_POST["single"]}', 
  '{$_POST["authorship"]}', '{$_POST["score"]}', '$my_doc', '{$_SESSION["email"]}')";
  createData($sql_b);
}

if(isset($_POST["add_c"])){
  $sql_c = "INSERT INTO rac_c (title, agency, period, grand, score, document, user)
  VALUES ('{$_POST["title"]}', '{$_POST["agency"]}', '{$_POST["period"]}', '{$_POST["grand"]}', '{$_POST["score"]}', '$my_doc', '{$_SESSION["email"]}')";
  createData($sql_c);
}

if(isset($_POST["add_d"])){
  $sql_d = "INSERT INTO rac_d (course, number, thesis, degree, score, document, user)
  VALUES ('{$_POST["course"]}', '{$_POST["number"]}', '{$_POST["thesis"]}', '{$_POST["degree"]}', '{$_POST["score"]}', '$my_doc', '{$_SESSION["email"]}')";
  createData($sql_d);
}

if(isset($_POST["add_e1"])){
  $sql_e1 = "INSERT INTO rac_e1 (paper, confrence, organiser, level, score, document, user)
  VALUES ('{$_POST["paper"]}', '{$_POST["confrence"]}', '{$_POST["organiser"]}', '{$_POST["level"]}', '{$_POST["score"]}', '$my_doc', '{$_SESSION["email"]}')";
  createData($sql_e1);
}

if(isset($_POST["add_e2"])){
  $sql_e2 = "INSERT INTO rac_e2 (lecture, confrence, organiser, level, score, document, user)
  VALUES ('{$_POST["lecture"]}', '{$_POST["confrence"]}', '{$_POST["organiser"]}', '{$_POST["level"]}', '{$_POST["score"]}', '$my_doc', '{$_SESSION["email"]}')";
  createData($sql_e2);
}

if(isset($_POST["add_f"])){
  $sql_f = "INSERT INTO rac_f (nature, module, year, score, document, user)
  VALUES ('{$_POST["nature"]}', '{$_POST["module"]}', '{$_POST["year"]}', '{$_POST["score"]}', '$my_doc', '{$_SESSION["email"]}')";
  createData($sql_f);
}

if(isset($_POST["add_g"])){
  $sql_g = "INSERT INTO rac_g (post, nature, year, organization, user)
  VALUES ('{$_POST["post"]}', '{$_POST["nature"]}', '{$_POST["year"]}', '{$_POST["organization"]}', '{$_SESSION["email"]}')";
  createData($sql_g);
}


$table_a = readData("rac_a");
$table_b = readData("rac_b");
$table_c = readData("rac_c");
$table_d = readData("rac_d");
$table_e1 = readData("rac_e1");
$table_e2 = readData("rac_e2");
$table_f = readData("rac_f");
$table_g = readData("rac_g");

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
          <a href="./photo_sign.php" class="list-group-item">Upload Photo And Signature</a>
          <a href="./academic.php" class="list-group-item">Academic Details</a>
          <a href="./net.php" class="list-group-item">NET / SLET / SET / GATE</a>
          <a href="./documents.php" class="list-group-item">Upload Documents</a>
          <a href="./research.php" class="list-group-item">Research Degree</a>
          <a href="./awards.php" class="list-group-item">Fellowship / Awards</a>
          <a href="./employment.php" class="list-group-item">Employment Details</a>
          <a href="./specialization.php" class="list-group-item">Field Of Specialization</a>
          <a href="./evaluations.php" class="list-group-item">Teaching, Learning & Evaluation related activities</a>
          <a href="./rac.php" class="list-group-item active">Research & Academic Contributions</a>
          <a href="./score.php" class="list-group-item">API score</a>
          <a href="./details.php" class="list-group-item">Other Details</a>
          <a href="./declaration.php" class="list-group-item">Declaration</a>
        </div>
      </div>
      <!-- Form Section -->
      <div class="col-9 p-3">



        <h5>(A) Research Papers Published in referred Journals/Other reputed Journal as notified by the UGC (Category-III)</h5>
      <!-- AAA -->
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_a)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["journal"] . "</td>";
                echo "<td>" . $row["isbn"] . "</td>";
                echo "<td>" . $row["peer"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["authorship"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_a'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!-- AAA -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='title' type="text" class="form-control" placeholder="Enter Title with page no." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Journal *</td>

                <td>
                  <input name='journal' type="text" class="form-control" placeholder="Enter Journal" required />
                </td>
              </tr>

              <tr scope="row">
                <td>ISSN / ISBN No. *</td>

                <td>
                  <input name='isbn' type="text" class="form-control" placeholder="Enter ISSN / ISBN No." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Peer Reviewed / Impact Factor (Provide UGC list no.) *</td>

                <td>
                  <input name='peer' type="text" class="form-control" placeholder="Enter Peer Reviewed / Impact Factor" required />
                </td>
              </tr>

              <tr scope="row">
                <td>No. of Co-authors *</td>

                <td>
                  <input name='author' type="text" class="form-control" placeholder="No. of co-author" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Authorship (Main author / Corresponding author) *</td>

                <td>
                  <input name='authorship' type="text" class="form-control" placeholder="Name of Author (Main / Corresponding)" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit" name='add_a'>Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_b)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["authorship"] . "</td>";
                echo "<td>" . $row["isbn"] . "</td>";
                echo "<td>" . $row["publisher"] . "</td>";
                echo "<td>" . $row["type"] . "</td>";
                echo "<td>" . $row["single"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_b'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!-- BBB Books Published Form -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='title' type="text" class="form-control" placeholder="Enter Book Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Type of Authorship *</td>

                <td>
                  <select name='authorship' class="custom-select" required>
                    <option>Select Type</option>
                    <option value="Single">Single</option>
                    <option value="Joint">Joint</option>
                  </select>
                </td>
              </tr>

              <tr scope="row">
                <td>ISSN / ISBN No. *</td>

                <td>
                  <input name='isbn' type="text" class="form-control" placeholder="Enter ISSN / ISBN No." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Publisher Type *</td>

                <td>
                  <select name='publisher' class="custom-select" required>
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
                  <input name='type' type="text" class="form-control" placeholder="Enter Type Of Book. Example: Text, Reference, Subject etc." required />
                </td>
              </tr>

              <tr scope="row">
                <td>Single / Co-author *</td>

                <td>
                  <input name='single' type="text" class="form-control" placeholder="Enter Single or Co-author" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button class="btn btn-warning" type="submit" name='add_b'>Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_c)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["agency"] . "</td>";
                echo "<td>" . $row["period"] . "</td>";
                echo "<td>" . $row["grand"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_c'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!-- Form -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='title' type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Agency *</td>

                <td>
                  <input name='agency' type="text" class="form-control" placeholder="Enter Agency Name" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Period *</td>

                <td>
                  <input name='period' type="text" class="form-control" placeholder="Enter Period" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Grand / Amount Sanctioned (Rs.) *</td>

                <td>
                  <input name='grand' type="number" class="form-control" placeholder="Enter Grand / Amount" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button name='add_c' class="btn btn-warning" type="submit">Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_d)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["course"] . "</td>";
                echo "<td>" . $row["number"] . "</td>";
                echo "<td>" . $row["thesis"] . "</td>";
                echo "<td>" . $row["degree"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_d'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!-- Research Guidance Form -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='course' type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Number of student enrolled *</td>

                <td>
                  <input name='number' type="number" class="form-control" placeholder="Enter Number of student enrolled" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Thesis Submitted *</td>

                <td>
                  <input name='thesis' type="text" class="form-control" placeholder="Enter Thesis Submitted" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Degree Awarded *</td>

                <td>
                  <input name='degree' type="text" class="form-control" placeholder="Enter Degree Awarded" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button name='add_d' class="btn btn-warning" type="submit">Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_e1)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["paper"] . "</td>";
                echo "<td>" . $row["confrence"] . "</td>";
                echo "<td>" . $row["organiser"] . "</td>";
                echo "<td>" . $row["level"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_e1'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!--  Paper Presented in Confrences/Seminars Form -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='paper' type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Title of Confrence / Seminar etc *</td>

                <td>
                  <input name='confrence' type="text" class="form-control" placeholder="Enter Title of Confrence / Seminar etc" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organised By *</td>

                <td>
                  <input name='organiser' type="text" class="form-control" placeholder="Enter Organiser" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Weather of International / National / State / University Level *</td>

                <td>
                  <select name='level' class="custom-select" required>
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
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button name='add_e1' class="btn btn-warning" type="submit">Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_e2)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["lecture"] . "</td>";
                echo "<td>" . $row["confrence"] . "</td>";
                echo "<td>" . $row["organiser"] . "</td>";
                echo "<td>" . $row["level"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_e2'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!--  Invited Lectures in Confrences/Seminars Form -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='lecture' type="text" class="form-control" placeholder="Enter Title" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Title of Confrence / Seminar etc *</td>

                <td>
                  <input name='confrence' type="text" class="form-control" placeholder="Enter Title of Confrence / Seminar etc" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organised By *</td>

                <td>
                  <input name='organiser' type="text" class="form-control" placeholder="Enter Organiser" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Weather of International / National / State / University Level *</td>

                <td>
                  <select name='level' class="custom-select" required>
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
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button name='add_e2' class="btn btn-warning" type="submit">Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_f)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["nature"] . "</td>";
                echo "<td>" . $row["module"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["score"] . "</td>";
                echo "<td><a target='_blank' href='./uploads/" . $row["document"] . "'>See your Document here</a></td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_f'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!--  Development of E-learning Material Form -->
        <form class="mt-4" enctype="multipart/form-data" action="rac.php" method='post'>
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
                  <input name='nature' type="text" class="form-control" placeholder="Enter Nature Of Activity" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Module Details *</td>

                <td>
                  <input name='module' type="text" class="form-control" placeholder="Enter Module Details" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year *</td>

                <td>
                  <input name='year' type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>API score *</td>

                <td>
                  <input name='score' type="text" class="form-control" placeholder="Enter API score" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Relevent Document (Max 300 KB)</td>
                <td>
                  <input name='new_document' onchange="validate()" type="file" accept="image/jpg, image/png, application/pdf" class="form-control" />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button name='add_f' class="btn btn-warning" type="submit">Add</button>
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
            <?php
              $i = 1;
              while($row = mysqli_fetch_assoc($table_g)){
                echo "<tr scope='row'>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $row["post"] . "</td>";
                echo "<td>" . $row["nature"] . "</td>";
                echo "<td>" . $row["year"] . "</td>";
                echo "<td>" . $row["organization"] . "</td>";
                echo "<td><form action='rac.php' method='post'>";
                echo "<input type='text' name='id'  class='d-none' value='" . $row["id"] . "'>";
                echo "<input type='text' name='table'  class='d-none' value='rac_g'>";
                echo "<input type='submit' name='del' value='Delete' class='btn btn-danger'> </form> </td> </tr>";

                $i = $i+1;
              }
            ?>
          </tbody>
        </table>
        <!--  Development of E-learning Material Form -->
        <form class="mt-4" action="rac.php" method='post'>
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
                  <input name='post' type="text" class="form-control" placeholder="Enter Post Held" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Nature Of Work *</td>

                <td>
                  <input name='nature' type="text" class="form-control" placeholder="Enter Nature Of Work" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Year *</td>

                <td>
                  <input name='year' type="number" class="form-control" placeholder="Enter Year" required />
                </td>
              </tr>

              <tr scope="row">
                <td>Organization / Institute *</td>

                <td>
                  <input name='organization' type="text" class="form-control" placeholder="Enter Organization / Institute" required />
                </td>
              </tr>
            </tbody>
          </table>

          <div class="mb-3 mt-3 text-center">
            <button name='add_g' class="btn btn-warning" type="submit">Add</button>
          </div>
        </form>
        <hr>



        <div class="text-center">
          <a href="./score.php" class="btn btn-primary">Continue</a>
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