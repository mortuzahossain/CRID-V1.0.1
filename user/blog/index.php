<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }
    $userid =$_SESSION['id'];

	$PAGENAME = "All blog post by user.";
	include $_SERVER["DOCUMENT_ROOT"].'/inc/header.php';
	include $_SERVER["DOCUMENT_ROOT"].'/inc/navbar.php';
?>


	<section class="container about-section">
		<div class="gap"></div>
		<div class="row">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="nav nav-tabs">
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/index.php">Home</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Profile</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/updatepassword.php">Update Password</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/profileimage.php">Upload Image</a></li>
				  <li role="presentation"   class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Blogs</a></li><li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog/addblog.php">Add Blog</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/delete.php">Delete Account</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Your posted blogs</h2>

<?php
	$sql = "SELECT * FROM blogs WHERE uid = $userid";
	$result = mysqli_query($con,$sql);
	$countblogs = mysqli_num_rows($result);
	if ($countblogs > 0) {
        

?>

    <table class="table table-striped table-hover">
        <tr>
            <th width="90%">Title</th>
            <th width="10%"></th>
        </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><a class="btn btn-default" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/single.php?id=<?php echo $row['id']; ?>">View</a></td>
        </tr>
    <?php } ?>

    </table>

<?php
	} else {
?>			
	<p>You havn't post any blog yet.</p>
<?php } ?>	
			</div>
		</div>
		
    </section>


<?php
	include $_SERVER["DOCUMENT_ROOT"].'/inc/footer.php';
?>