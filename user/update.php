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

	$PAGENAME = "Update Users Profile";
	include $_SERVER["DOCUMENT_ROOT"].'/inc/header.php';
	include $_SERVER["DOCUMENT_ROOT"].'/inc/navbar.php';
?>


	<section class="container about-section">
		<div class="gap"></div>

<?php
	if (isset($_POST['update'])) {
		$name = xss_cleaner($_POST['name']);
		$gender = xss_cleaner($_POST['gender']);
		$account_type = xss_cleaner($_POST['account_type']);

		$update_query = "UPDATE users set name = '$name',gender = '$gender',account_type = '$account_type' WHERE id = $userid";

		if (mysqli_query($con,$update_query)) {
			echo "<div class='alert alert-success' role='alert'>User information updated sucessfully.</div>";
		} else {
			echo "<div class='alert alert-warning' role='alert'>We are fetching problem in updating your information.</div>";
		}
	}

?>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ul class="nav nav-tabs">
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/index.php">Home</a></li>
				  <li role="presentation"  class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Profile</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/updatepassword.php">Update Password</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Blogs</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Add Blog</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/delete.php">Delete Account</a></li>
				</ul>
			</div>
		</div>
<?php
$sql = "SELECT name FROM users WHERE id = $userid";
$result = mysqli_query($con,$sql)->fetch_assoc();
?>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Update Your Profile</h2>
				<form method="post" accept="">
				  <div class="form-group">
				    <label for="Name">Name</label>
				    <input type="text" class="form-control" id="Name" placeholder="" name="name"value="<?php echo $result['name']; ?>">
				  </div>
				  <div class="form-group">
	                <label for="gender">Gender</label><br>
	                <input type="radio" name="gender" value="Male" required="1"> Male <br>
	                <input type="radio" name="gender" value="Female" required="1"> Female<br>
	              </div>
	              <div class="form-group">
	                  <label for="account_type">Account Type</label>
	                  <select class="form-control" required="1" name="account_type">
	                      <option value="Enthusiast/Learner">Enthusiast/Learner</option>
	                      <option value="Professional/Expert">Professional/Expert</option>
	                      <option value="Mentor/Trainer">Mentor/Trainer</option>
	                  </select>
	              </div>
				  <button type="submit" class="btn btn-primary" name="update">Update</button>
				</form>
			</div>
		</div>
		
    </section>


<?php
	include $_SERVER["DOCUMENT_ROOT"].'/inc/footer.php';
?>