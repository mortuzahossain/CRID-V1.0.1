<?php
  $PAGE = 'Create Blog';
  include '../inc/header.php';
  include '../inc/navbar.php';
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
                    <h3 class="panel-title">Create Blog Posts</h3>
                </div>


              <?php
                if (isset($_POST['save'])) {
                  $title = strip_tags($_POST['title']);
                  $body = $_POST['body'];
                  $publisher_name = strip_tags($_POST['publishername']);

                  $insertquery = "INSERT INTO blogs (title,body,publisher_name) VALUES ('$title','$body','$publisher_name')";
                  if (mysqli_query($con,$insertquery)) {
                    $locationurl =SCRIPT_ROOT. '/admin/blog/index.php';
                    header('Location: '.$locationurl);
                    exit();
                  } else {
                    echo "Error During Saving Data. Please Try again";
                  }
                }
              ?>


                <div class="panel-body home-panel">
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                      <label>Publisher Name</label>
                      <input type="text" class="form-control" name="publishername">
                    </div>
              		  <div class="form-group">
                      <label>Body</label>
              		    <textarea class="form-control" name="body"></textarea>
              		  </div>
              		  <button type="submit" name="save" class="btn btn-primary float-right">Upload Post</button>
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
