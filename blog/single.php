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

<style>.post-meta>a{color:#149aa9}.left>img{height:150px;width:150px;border-radius:50%}.left{float:left;display:block}.right{margin-right:75px}hr{border-top:4px solid #e5e5e5}</style>

    <section class="container about-section">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 text-center">
            <h1 class="animated text-center"><?php echo $result['title']; ?></h1>
            <div class="left"><img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/images/150.png" alt=""></div>
            <div class="right"><h4 class="post-meta">Posted by <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/search.php?s=<?php echo $result['publisher_name']; ?>"><?php echo $result['publisher_name']; ?></a></h4>
            <h4>on <?php echo $result['publishtime']; ?></h4></div>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="details">
              <?php echo $result['body']; ?>
            </div>
          </div>
        </div>
    </section>


<?php include '../inc/footer.php'; ?>