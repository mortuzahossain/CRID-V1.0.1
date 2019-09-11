<?php

  $PAGE = "View Email";
  include 'inc/header.php';
  include 'inc/navbar.php';

  if (!isset($_GET['id'])) {
    echo '<script>document.location.replace("index.php");</script>';
    exit();
  } else {
    $id = $_GET['id'];
  }

?>




    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">

            <?php
                include 'inc/sidebar.php';
            ?>

          </div>
          <div class="col-md-9">

            <?php
                $sql = "SELECT * FROM contactus WHERE id = $id";
                if ($result = mysqli_query($con,$sql)->fetch_assoc()){
                $sql = "UPDATE contactus SET seen = 1 WHERE id = $id";
                mysqli_query($con,$sql);
            ?>


            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Email</h3>
                </div>
                <div class="panel-body">
                    <h3>Subject: <?php echo $result['subject']; ?></h3>
                    <h4>Name: <?php echo $result['name']; ?></h4>
                    <h5><?php echo $result['email']; ?></h5>
                    <hr>
                    <p><?php echo $result['message']; ?></p>
                </div>
            </div>

<?php
    } else {
        echo "Some error occured in server. Sorry for that. Please try again.";
    }
        
?>


          </div>
        </div>
      </div>
    </section>

<?php
    include 'inc/footer.php';
?>