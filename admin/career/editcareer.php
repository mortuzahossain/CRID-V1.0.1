<?php
    $PAGE = 'Edit Career Post';
    include '../inc/header.php';
    include '../inc/navbar.php';

    if (!isset($_GET['id'])) {
      echo '<script>document.location.replace("index.php");</script>';
      exit();
    } else {
      $id = $_GET['id'];
    }

    if (isset($_POST['save'])) {
      $position = strip_tags($_POST['position']);
      $vacancy = strip_tags($_POST['vacancy']);
      $applylink = strip_tags($_POST['applylink']);
      $jobdetails = $_POST['jobdetails'];
      
      $updatequery = "UPDATE careers SET position = '$position',vacancy = '$vacancy',applylink = '$applylink',jobdetails = '$jobdetails' WHERE id = $id";

      if (mysqli_query($con,$updatequery)) {
        $locationurl =SCRIPT_ROOT. '/admin/career/career.php';
        header('Location: '.$locationurl);
        exit();
      } else {
        echo "Error During Updating Data. Please Try again";
      }
    }

    if (isset($_POST['delete'])) {
      $deletesql = "UPDATE careers SET status = 0 WHERE id = $id";
      if (mysqli_query($con,$deletesql)) {
        $locationurl =SCRIPT_ROOT. '/admin/career/career.php';
        header('Location: '.$locationurl);
        exit();
      } else {
        echo "Error During Deleting Data. Please Try again";
      }
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
                    <h3 class="panel-title">Create Career Posts</h3>
                </div>

                <?php
                  $sql = "SELECT * FROM careers WHERE id = $id";
                  $result = mysqli_query($con,$sql)->fetch_assoc();
                ?>

                <div class="panel-body home-panel">
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Position</label>
                      <input type="text" class="form-control" name="position" value="<?php echo $result['position']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Vacancy</label>
                      <input type="number" class="form-control" name="vacancy" value="<?php echo $result['vacancy']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Apply link (Google Form)</label>
                      <input type="text" class="form-control" name="applylink" value="<?php echo $result['applylink']; ?>">
                    </div>
              		  <div class="form-group">
              		    <textarea class="form-control" name="jobdetails"><?php echo $result['jobdetails']; ?></textarea>
              		  </div>
              		  <button type="submit" name="save" class="btn btn-primary float-right">Update Post</button>
                    <button type="submit" name="delete" class="btn btn-primary float-right">Delete Post</button>
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
