<?php
    $PAGENAME = "Login";
    include 'db/dbconfig.php';
    session_start();

    // If already Login
    if (isset($_SESSION['id'])) {
        echo '<script>document.location.replace("index.php");</script>';
    }
    
    function xss_cleaner($input_str) {
        $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
        $return_str = str_ireplace( '%3Cscript', '', $return_str );
        return $return_str;
    }

    if (isset($_POST['submit'])) {
        $email = xss_cleaner(htmlspecialchars($_POST['email']));
        $password = md5(xss_cleaner(htmlspecialchars($_POST['password'])));

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($con,$sql);
        $have_user = mysqli_num_rows($result);
        if ($have_user == 1) {
          $result = $result->fetch_assoc();
          $_SESSION['id'] = $result['id'];
          $_SESSION['name'] = $result['name'];
          echo '<script>document.location.replace("index.php");</script>';
        } else{
            $err = "Error Occurd";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Md Mortuza Hossain">
    <title><?php echo $PAGENAME; ?> | CRID-DAM ROBOTIC LABS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head><!--/head-->
<body>


    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>

    <?php include 'inc/navbar.php'; ?>

    <section class="container">

<?php
    if (isset($err)) {
        echo "<div class='alert alert-warning' role='alert'>Please register first to login.Or check your email and password again.</div>";
    }
?>

      <div class="gap"></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <form action="" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Choose Your Password" required>
              </div>
              <div class="gap"></div>
              <input  type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>
            </div>
        </div>
    </section>

<?php
    include 'inc/footer.php';
?>
