<?php
    $PAGENAME = "Thanks";
    include 'inc/header.php';
    include 'inc/navbar.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (!empty($name) and !empty($email) and !empty($subject) and !empty($message)) {
          $sql = "INSERT INTO contactus (name, email, subject, message) VALUES ('$name','$email','$subject','$message')";
          if (!mysqli_query($con,$sql)) {
            echo "<p class='text-center bg-danger'>Error !! Please try again another time.</p>";
          }
        } else {
          echo "<p class='text-center bg-danger'>Please Fill the form and then submit again.</p>";
        }
    } else {
        echo '<script>document.location.replace("index.php");</script>';
    }
?>
    <section class="container text-center">
        <img height="130px" src="http://home.criddam.com/images/1.gif" alt="Thanks Image">
        <h1>Thanks For your Email. <br> We will get back to you as soon as possible.</h1>
        <a href="/"><p class="btn btn-primary btn-lg">Home</p></a>
    </section>

<?php
    include 'inc/footer.php';
?>
