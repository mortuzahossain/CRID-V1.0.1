<?php
  $PAGE = 'Edit Blog';
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
              <?php include '../inc/sidebar.php'; ?>
          </div>
          <div class="col-md-9">
            <div class="panel panel-default carrierpanel">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Edit Blog Posts</h3>
                </div>


              <?php
                if (isset($_POST['save'])) {

                  $title = strip_tags($_POST['title']);
                  $body = $_POST['body'];

                  $insertquery = "UPDATE blogs SET title = '$title',body = '$body',publisher_name ='$publisher_name' WHERE id = $id";
                  if (mysqli_query($con,$insertquery)) {
                    $locationurl =SCRIPT_ROOT. '/admin/blog/index.php';
                    header('Location: '.$locationurl);
                    exit();
                  } else {
                    echo "Error During Updating Data. Please Try again";
                  }
                }

                $sql = "SELECT * FROM blogs WHERE id = $id";
                $result = mysqli_query($con,$sql)->fetch_assoc();

                ?>

                <div class="panel-body home-panel">
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $result['title']; ?>">
                    </div>
              		  <div class="form-group">
                      <label>Body</label>
              		    <textarea class="form-control" name="body"><?php echo $result['body']; ?></textarea>
              		  </div>
              		  <button type="submit" name="save" class="btn btn-primary float-right">Update Post</button>
              		</form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
    include '../inc/footer.php';
?>

  <script src="../ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
    CKEDITOR.replace('body');
  </script>
