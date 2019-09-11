<?php
  $PAGE = 'Career';
  include '../inc/header.php';
  include '../inc/navbar.php';
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
                if (isset($_GET['p']) && $_GET['p'] < 0) {
                    $startpage = 1;
                } elseif (isset($_GET['p']) ){
                    $startpage = ($_GET['p'] * POST_PER_PAGE) - POST_PER_PAGE;
                } else {
                    $startpage = 0;
                }

                $sql = "SELECT * FROM careers WHERE status = 1 ORDER BY id DESC LIMIT $startpage,".POST_PER_PAGE;
                $result = mysqli_query($con,$sql);
                $countemais = mysqli_num_rows($result);

            ?>


            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Career Posts</h3>
                </div>
                <div class="panel-body home-panel carrierpanel">
                    <h2>Actieve Jobs</h2>

                    <?php

                        if ($countemais > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $careers[] = $row;
                            }
                    ?>

                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Position</th>
                            <th>Vacancy</th>
                            <th></th>
                        </tr>

                    <?php foreach ($careers as $key) { ?>
                        <tr>
                            <td><?php echo $key['position']; ?></td>
                            <td><?php echo $key['vacancy']; ?></td>
                            <td><a class="btn btn-default" href="detailcareer.php?id=<?php echo $key['id'] ?>">View</a></td>
                        </tr>

                    <?php } ?>

                    </table>

                    <?php } else { ?>

                        No Job Post Available Right Now.

                    <?php } ?>
                
                    <div class="pagination text-center">
                    <?php
                        $sql = "SELECT id FROM careers";
                        $total = mysqli_num_rows(mysqli_query($con,$sql));
                        $total = ceil($total/POST_PER_PAGE);

                        // Getting the current page number
                        if (isset($_GET['p'])) {
                            $current_page = $_GET['p'];
                        } else {
                            $current_page = 1;
                        }

                        for ($i=1; $i <= $total ; $i++) {

                        if ($i == $current_page) {

                    ?>
                    <a class="actieve" href="detailcarrier.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php
                        } else {
                    ?>
                        <a href="detailcarrier.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php } } ?>
                    </div>

                </div>

                

            </div>

          </div>
        </div>
      </div>
    </section>

<?php
    include '../inc/footer.php';
?>
