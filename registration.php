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
    <title>Lucknow University Recruitment Portal - Registration</title>
  </head>

  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-light border-bottom">
      <a href="./index.php" class="navbar-brand">
        <!-- Desktop Logo-->
        <img
          class="d-sm-none d-md-block"
          src="./assets/logo.png"
          alt="Logo"
          width="300"
        />

        <!-- Mobile Logo -->
        <img
          class="d-none d-sm-block d-md-none"
          src="./assets/LU_Logo.png"
          alt="Lucknow University Logo"
          width="100"
        />
      </a>

      <div class="inline-flex">
        <a href="./registration.php" class="btn btn-primary">Register</a>
        <a href="./signin.php" class="btn btn-info">Sign In</a>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="content pb-3">
        <!-- Heading -->
        <h4 class="text-center mt-3">Registration</h4>

        <div class="d-flex justify-content-center">
          <form class="card registration-form mt-3 p-3">
            <div class="form-group">
              <label>Email Address *</label>
              <input
                type="email"
                class="form-control"
                placeholder="Enter email"
              />
              <small class="form-text text-muted">
                Please note all the communication related to your application
                will be sent to this email id.
              </small>
            </div>

            <div class="form-group">
              <label>Confirm Email Address *</label>
              <input
                type="email"
                class="form-control"
                placeholder="Confirm email"
              />
            </div>

            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Password"
              />
            </div>

            <div class="form-group">
              <label>Confirm Password *</label>
              <input
                type="password"
                class="form-control"
                placeholder="Password"
              />
            </div>

            <div class="form-group">
              <label>Candidate Name</label>
              <div class="form-row">
                <div class="col">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                  />
                </div>
                <div class="col">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Middle name"
                  />
                </div>
                <div class="col">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                  />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Date Of Birth *</label>
              <input class="form-control" type="date" />
            </div>

            <div class="form-group">
              <label>Gender *</label>
              <select class="form-control">
                <option>Select Gender</option>
              </select>
            </div>

            <div class="form-group">
              <label>Father's Name</label>
              <input
                class="form-control"
                type="text"
                placeholder="Father's Name"
              />
              <small class="form-text text-muted">
                Don't add any salutations like Mr. / Dr. etc. before the Name.
              </small>
            </div>

            <div class="text-center">[OR]</div>

            <div class="form-group">
              <label>Mother's Name</label>
              <input
                class="form-control"
                type="text"
                placeholder="Mother's Name"
              />
              <small class="form-text text-muted">
                Don't add any salutations like Ms. / Mrs. / Dr. etc. before the
                Name.
              </small>
            </div>

            <div class="form-group">
              <label>Mobile No. *</label>
              <input
                class="form-control"
                type="text"
                placeholder="Mobile No."
              />
            </div>

            <div class="form-group">
              <label>Confirm Mobile No. *</label>
              <input
                class="form-control"
                type="text"
                placeholder="Mobile No."
              />
            </div>

            <button type="submit" class="btn btn-primary">Register</button>

            <div class="text-center mt-3">
              Already Registered? <a href="/signin.html">Back to Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer class="text-center pt-4 pb-4">
      © 2020 Lucknow University
    </footer>
  </body>
</html>
