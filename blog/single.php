<?php
    // Resticted Blog Users
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }
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
    $uid = $_SESSION['id'];
    $namesql = "SELECT name from users WHERE id = $uid";
    $nameresult = mysqli_query($con,$namesql)->fetch_assoc();
    $fileurl = $_SERVER['DOCUMENT_ROOT']."/user/images/".$uid.".jpg";
    if (!file_exists($fileurl)) {
      $fileurl = 'http://'.$_SERVER['SERVER_NAME']."/images/150.png";
    } else {
      $fileurl = 'http://'.$_SERVER['SERVER_NAME']."/user/images/".$uid.".jpg";
    }
    // $imageurl = (file_exists($fileurl))?$fileurl?:$_SERVER['SERVER_NAME']."/images/150.png";
?>

<style>.post-meta>a{color:#149aa9}.left>img{height:150px;width:150px;border-radius:50%}.left{float:left;display:block}.right{margin-right:75px}hr{border-top:4px solid #e5e5e5}</style>

    <section class="container about-section">
        <div class="row">
          <div class="gap"></div>
          <div class="col-md-10 col-md-offset-1 text-center">
            <img class="img-circle" src="<?php echo $fileurl; ?>" alt="">
            <h1 class="animated text-center"><?php echo $result['title']; ?></h1>
            <h4 class="post-meta">Posted by <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/search.php?s=<?php echo $nameresult['name']; ?>"><?php echo $nameresult['name']; ?></a></h4>
            <h4>on <?php echo $result['publishtime']; ?></h4>
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