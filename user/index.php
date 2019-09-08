<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }

	$PAGENAME = "Users Profile";
	include $_SERVER["DOCUMENT_ROOT"].'/inc/header.php';
	include $_SERVER["DOCUMENT_ROOT"].'/inc/navbar.php';
?>


	<section class="container about-section">
		<div class="gap"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ul class="nav nav-tabs">
				  <li role="presentation" class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/index.php">Home</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Profile</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Password</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Blogs</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Add Blog</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/delete.php">Delete Account</a></li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">User's Information</h2>
				<?php
					$userid =$_SESSION['id'];
					$sql = "SELECT * FROM users WHERE id = $userid";
					$result = mysqli_query($con,$sql)->fetch_assoc();
				?>
				<table class="table table-hover">
					<tr>
						<td>Name</td>
						<td><?php echo $result['name']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo $result['email']; ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo $result['gender']; ?></td>
					</tr>
					<tr>
						<td>Account Type</td>
						<td><?php echo $result['account_type']; ?></td>
					</tr>
				</table>
			</div>
		</div>
		
    </section>


<?php
	include $_SERVER["DOCUMENT_ROOT"].'/inc/footer.php';
?>