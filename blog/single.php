<?php
    $PAGENAME = "Blog Post";
    if (!isset($_GET['id'])) {
      echo '<script>document.location.replace("index.php");</script>';
      exit();
    } else {
      $id = $_GET['id'];
    }
    include '../inc/header.php';
    include '../inc/navbar.php';
    $sql = "SELECT * FROM blogs WHERE id = $id";
    $result = mysqli_query($con,$sql)->fetch_assoc();
?>

    <section class="container about-section">
        <h1 class="animated text-center"><?php echo $result['title']; ?></h1>
        <hr>
        <div class="details">
          <?php echo $result['body']; ?>
        </div>

    </section>


<?php include '../inc/footer.php'; ?>