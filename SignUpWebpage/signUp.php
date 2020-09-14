<?php include('../server.php') ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SignUp page</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div class="main">
      <div class="container">
        <form action="" method="POST">
          <?php include('../errors.php'); ?>
          <h2>Create Account</h2>
          <div class="form-group">
            <label for="email">Email:</label>
            <input
              type="email"
              class="form-control"
              id="Email"
              placeholder="Enter email"
              name="Email"
              value="<?php echo $email; ?>"
              required
            />
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input
              type="password"
              class="form-control"
              id="User_Password"
              placeholder="Enter password"
              name="User_Password"
              required
            />
          </div>
          <button type="submit" name="reg_user" class="btn btn-primary">Sign Up</button>
          <h4>Already have an account?<a href="../index.php">Login here</a></h4>
        </form>
      </div>
    </div>
  </body>
</html>
