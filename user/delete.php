<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }

	$userid =$_SESSION['id'];

    function xss_cleaner($input_str) {
        $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
        $return_str = str_ireplace( '%3Cscript', '', $return_str );
        return htmlspecialchars($return_str);
    }

	$PAGENAME = "Delete Account";
	include $_SERVER["DOCUMENT_ROOT"].'/inc/header.php';
	include $_SERVER["DOCUMENT_ROOT"].'/inc/navbar.php';
?>


	<section class="container about-section">
		<div class="gap"></div>

<?php
	if (isset($_POST['delete'])) {
		$email = xss_cleaner($_POST['email']);
		$confirmpassword = xss_cleaner($_POST['confirmpassword']);

		$password = md5($confirmpassword);
		$deletequery = "DELETE FROM users WHERE email='$email' AND password ='$password' AND id = $userid";
		// echo $deletequery;

		if (mysqli_query($con,$deletequery)) {
			session_unset();
			session_destroy();
			echo "<div class='alert alert-success' role='alert'>Delete successfully.</div>";
		} else {
			echo "<div class='alert alert-warning' role='alert'>We are fetching problem in updating your information.</div>";
		}

	}

?>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="nav nav-tabs">
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/index.php">Home</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Profile</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/updatepassword.php">Update Password</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/profileimage.php">Upload Image</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Blogs</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Add Blog</a></li>
				  <li role="presentation"  class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/delete.php">Delete Account</a></li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Delete Account</h2>
				<p class="alert alert-warning">All of your data will be deleted. So please be aware of this situation. Type your email and password to delete.</p>
				<form method="post" accept="">
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" placeholder="" name="email">
				  </div>
				  <div class="form-group">
				    <label for="confirmpassword">Confirm Password</label>
				    <input type="password" class="form-control" id="confirmpassword" placeholder="" name="confirmpassword">
				  </div>
				  <button type="submit" class="btn btn-primary" name="delete">Delete Account</button>
				</form>
			</div>
		</div>
		
    </section>


<?php
	include $_SERVER["DOCUMENT_ROOT"].'/inc/footer.php';
?>