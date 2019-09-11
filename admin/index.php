<?php
  $PAGE = "DASHBOARD";
  include 'inc/header.php';
  include 'inc/navbar.php';

?>




    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">

            <?php
                include 'inc/sidebar.php';
            ?>

          </div>
          <div class="col-md-9">


            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 000</h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 000</h2>
                    <h4>Pages</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 000</h2>
                    <h4>Posts</h4>
                  </div>
                </div>
              </div>
              </div>


<?php
    
    // For Contact Us Last 5 unread email
    $sql = "SELECT * FROM contactus WHERE seen = 0 ORDER BY id DESC LIMIT 10";
    $result = mysqli_query($con,$sql);
    $countemais = mysqli_num_rows($result);

?>


            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Emails</h3>
                </div>
                <div class="panel-body">

                    <?php

                        if ($countemais > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $emails[] = $row;
                            }
                    ?>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Subject</th>
                            <th>Email</th>
                            <th></th>
                        </tr>

                    <?php foreach ($emails as $email) { ?>
                        <tr>
                            <td><?php echo $email['subject']; ?></td>
                            <!-- glyphicon glyphicon-remove -->
                            <td><?php echo $email['email']; ?></td>
                            <td><a class="btn btn-default" href="viewemail.php?id=<?php echo $email['id'] ?>">View</a></td>
                        </tr>

                    <?php } ?>
                    
                    </table>

                    <?php } else { ?>
                        
                        No Unread Email.
                    
                    <?php } ?>

                </div>
            </div>



          </div>
        </div>
      </div>
    </section>

<?php
    include 'inc/footer.php';
?>