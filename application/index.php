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
  <!-- Navigation Bar -->
  <nav class="navbar navbar-light border-bottom">
    <a href="./" class="navbar-brand">
      <!-- Desktop Logo-->
      <img class="d-none d-md-block" src="../assets/logo.png" alt="Logo" width="300" />

      <!-- Mobile Logo -->
      <img class="d-sm-block d-md-none" src="../assets/LU_Logo.png" alt="Lucknow University Logo" width="100" />
    </a>

    <div class="inline-flex">
      <a href="#" class="btn btn-primary">Change Password</a>
      <a href="#" class="btn btn-info">Logout</a>
    </div>
  </nav>

  <div class="container-fluid">
    <h4 class="text-center mt-3">My Application(s)</h4>
    <p class="text-center">Status of application(s): </p>
    <div class="content d-flex justify-content-center p-4">
      <form class="form-width-400">
        <select name="post" class="form-control mb-2 mr-sm-2" required>
          <option value="">Select Post</option>
          <option value="Assistant Professor">Assistant Professor</option>
          <option value="Associate Professor">Associate Professor</option>
          <option value="Professor">Professor</option>

        </select>

        <div class="form-group">
          <label for="Post Code">Post Code</label>
          <input class="form-control" type="text" name="Post Code" placeholder="Enter Post Code" />
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>