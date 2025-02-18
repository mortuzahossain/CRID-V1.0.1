<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }
    $PAGENAME = "Search Blog";
    define('POST_PER_PAGE', 10);
    
    include '../inc/header.php';
    include '../inc/navbar.php';

    if (isset($_GET['p']) && $_GET['p'] < 0) {
        $startpage = 1;
    } elseif (isset($_GET['p']) ){
        $startpage = ($_GET['p'] * POST_PER_PAGE) - POST_PER_PAGE;
    } else {
        $startpage = 0;
    }

    function xss_cleaner($input_str) {
        $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
        $return_str = str_ireplace( '%3Cscript', '', $return_str );
        return htmlspecialchars($return_str);
    }

    $countblogs = 0;

    if (isset($_GET['s']) or isset($_GET['submit'])) {
        $search = xss_cleaner($_GET['s']);
        // Filter search string
        $sql = "SELECT blogs.*,users.name FROM blogs INNER JOIN users ON blogs.uid = users.id WHERE blogs.published = 1 AND CONCAT(`title`, `body`, `published`,`name`) LIKE '%".$search."%' ORDER BY blogs.id DESC LIMIT  $startpage,".POST_PER_PAGE;
        // echo $sql;
        $result = mysqli_query($con,$sql);
        $countblogs = mysqli_num_rows($result);
    }
    
?>

<style type="text/css">.post-preview>a{color:#212529}.post-preview>a:focus,.post-preview>a:hover{text-decoration:none;color:#0085a1}.post-preview>a>.post-title{font-size:30px;margin-top:30px;margin-bottom:10px}.post-preview>a>.post-subtitle{font-weight:300;margin:0 0 10px}.post-preview>.post-meta{font-size:18px;font-style:italic;margin-top:0;color:#868e96}.post-preview>.post-meta>a{text-decoration:none;color:#212529}.post-preview>.post-meta>a:focus,.post-preview>.post-meta>a:hover{text-decoration:underline;color:#0085a1}@media only screen and (min-width:768px){.post-preview>a>.post-title{font-size:36px}}.btn{font-size:14px;font-weight:800;letter-spacing:1px;text-transform:uppercase;border-radius:0;font-family:'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif}.btn-primary{background-color:#0085a1;border-color:#0085a1}.btn-primary:active,.btn-primary:focus,.btn-primary:hover{color:#fff;background-color:#00657b!important;border-color:#00657b!important}</style>

<div class="container" style="margin-top: 50px;">
	<h1 class="animated text-center"><?php echo $PAGENAME; ?></h1>
	<hr>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <form method="get" class="form-inline">
              <div class="form-group">
                <input type="text" class="form-control" name="s" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto col-md-offset-2">
        <?php
            if ($countblogs > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="post-preview">
                  <a href="single.php?id=<?php echo $row['id']; ?>">
                    <h2 class="post-title">
                      <?php echo $row['title']; ?>
                    </h2>
                    <h3 class="post-subtitle">
                      <?php echo substr($row['body'], 0, 50); ?>
                    </h3>
                  </a>
                  <p class="post-meta">Posted by
                    <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/search.php?s=<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                    on <?php echo $row['publishtime']; ?></p>
                </div>
                <hr>
        <?php
                }
        ?>

        <div class="clearfix">
        <?php
            $sql = "SELECT * FROM blogs INNER JOIN users ON blogs.uid = users.id WHERE blogs.published = 1 AND CONCAT(`title`, `body`, `published`,`name`) LIKE '%".$search."%' ORDER BY blogs.id DESC";
            $total = mysqli_num_rows(mysqli_query($con,$sql));
            $total = ceil($total/POST_PER_PAGE);

            if (isset($_GET['p'])) {
                $current_page = $_GET['p'];
            } else {
                $current_page = 1;
            }
            
            for ($i=1; $i <= $total ; $i++) {
            if ($i == $current_page) {
            ?>
              <a class="btn btn-warning float-right" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/search.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php
                } else {
            ?>
              <a class="btn btn-primary float-right" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/search.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php } } ?>
        </div>

        <?php
            } else {
                echo "No Blog Post Available Right Now.";
            }
        ?>
      </div>
    </div>
  </div>


<?php
	include '../inc/footer.php';
?>