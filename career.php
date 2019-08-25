<?php
    $PAGENAME = "Career";
    include 'inc/header.php';
    include 'inc/navbar.php';
?>


    <section class="container about-section">
        <h1 class="animated text-center">Career</h1>
        <hr>

        <div class="row">

      <?php
        $sql = "SELECT * FROM careers WHERE status = 1 ORDER BY id DESC";
        $result = mysqli_query($con,$sql);
        $countemais = mysqli_num_rows($result);
        if ($countemais > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $careers[] = $row;
            }
            foreach ($careers as $key) {
      ?>

      <a href="singlecareer.php?id=<?php echo $key['id']; ?>">
          <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
              <div class="caption">
                <h3><?php echo $key['position']; ?></h3>
                <p>Vacancy: <?php echo $key['vacancy']; ?></p>
                <p><a href="<?php echo $key['applylink']; ?>" class="btn btn-primary" role="button">Apply Now</a></p>
              </div>
            </div>
          </div>
      </a>
      
      <?php
        } } else {
          echo "<h2>No Job Available right now.</h2>";
        }
      ?>

        </div>

    </section>


<?php include 'inc/footer.php'; ?>
