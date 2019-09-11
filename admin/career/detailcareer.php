<?php

  $PAGE = "Career Post View";
  include '../inc/header.php';
  include '../inc/navbar.php';

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
                include '../inc/sidebar.php';
            ?>

          </div>
          <div class="col-md-9">

            <?php
                $sql = "SELECT * FROM careers WHERE id = $id";
                if ($result = mysqli_query($con,$sql)->fetch_assoc()){
            ?>

            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Detail Career</h3>
                </div>
                <div class="panel-body">
                    <h3>Post: <?php echo $result['position']; ?></h3>
                    <h4>Vacancy: <?php echo $result['vacancy']; ?></h4>
                    <h5><a href="<?php echo $result['applylink']; ?>">Apply Link</a></h5>
                    <hr>
                    <p><?php echo $result['jobdetails']; ?></p>

                    <hr>

                    <a href="editcareer.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit</a> || <a href="detelecareer.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
    include '../inc/footer.php';
?>