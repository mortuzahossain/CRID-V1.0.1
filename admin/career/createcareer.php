<?php
  $PAGE = 'Create Career';
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
                    <h3 class="panel-title">Create Career Posts</h3>
                </div>


              <?php
                if (isset($_POST['save'])) {
                  $position = strip_tags($_POST['position']);
                  $vacancy = strip_tags($_POST['vacancy']);
                  $applylink = strip_tags($_POST['applylink']);
                  $jobdetails = $_POST['jobdetails'];

                  $insertquery = "INSERT INTO careers (position,vacancy,applylink,jobdetails) VALUES ('$position','$vacancy','$applylink','$jobdetails')";
                  if (mysqli_query($con,$insertquery)) {
                    $locationurl =SCRIPT_ROOT. '/admin/career/career.php';
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
                      <label>Position</label>
                      <input type="text" class="form-control" name="position">
                    </div>
                    <div class="form-group">
                      <label>Vacancy</label>
                      <input type="number" class="form-control" name="vacancy">
                    </div>
                    <div class="form-group">
                      <label>Apply link (Google Form)</label>
                      <input type="text" class="form-control" name="applylink">
                    </div>
              		  <div class="form-group">
              		    <textarea class="form-control" name="jobdetails"></textarea>
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
    CKEDITOR.replace('jobdetails');
  </script>
