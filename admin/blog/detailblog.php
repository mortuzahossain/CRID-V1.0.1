<?php

  $PAGE = "Detals Blog Post View";
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
                $sql = "SELECT blogs.*,users.name FROM blogs INNER JOIN users ON blogs.uid = users.id";
                if ($result = mysqli_query($con,$sql)->fetch_assoc()){
            ?>

            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Detail Career</h3>
                </div>
                <div class="panel-body">
                    <h3>Post Title: <?php echo $result['title']; ?></h3>
                    <h4>Publisher Name: <?php echo $result['name']; ?></h4>
                    <hr>
                    <p><?php echo $result['body']; ?></p>

                    <hr>

                    <?php if ($result['published'] == 0) { ?>
                    <a href="actieve.php?id=<?php echo $id; ?>" class="btn btn-primary">Actieve</a>
                    <?php }else{ ?>
                    <a href="deleteblog.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>;
                    <?php } ?>

                    
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