<?php
  session_start();
  // Database Configuration
  include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';

  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT id,username FROM admins WHERE email = '$email' AND password ='$password'";
    $result = mysqli_query($con,$sql);
    $have_user = mysqli_num_rows($result);

    if ($have_user > 0) {
        $_SESSION['login'] = "1";
        $usersinfo = $result->fetch_assoc();
        $_SESSION['username'] = $usersinfo['username'];
        echo '<script>document.location.replace("index.php");</script>';
    } else {
        echo "<h2 class='text-center'>Failed To Login . Please Tye Again.</h2>";
    }

  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRID || Login Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form action="" class="well" method="post">
                  <div class="form-group">
                    <label>Email Address / Username</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" required="1">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required="1">
                  </div>
                  <button type="submit" name="login" class="btn btn-default btn-block">Login</button>
              </form>
          </div>
        </div>
      </div>
    </section>


<?php
  include 'inc/footer.php';
?>