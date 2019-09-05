<?php
    $PAGENAME = "Career Post Details";
    if (!isset($_GET['id'])) {
      echo '<script>document.location.replace("index.php");</script>';
      exit();
    } else {
      $id = $_GET['id'];
    }
    include 'inc/header.php';
    include 'inc/navbar.php';

    $sql = "SELECT * FROM careers WHERE id = $id";
    $result = mysqli_query($con,$sql)->fetch_assoc();
?>

    <section class="container about-section">
        <h1 class="animated text-center">Career || <?php echo $result['position']; ?></h1>
        <hr>
        <div class="text-center">
          <h3>Vacancy: <?php echo $result['vacancy']; ?></h3>
          <a href="<?php echo $result['applylink']; ?>"><p class="btn btn-success">Apply Now</p></a>
        </div>
        <hr>

        <div class="details">
          <?php echo $result['jobdetails']; ?>
        </div>

    </section>


<?php include 'inc/footer.php'; ?>
