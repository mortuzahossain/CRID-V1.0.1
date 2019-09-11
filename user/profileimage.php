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

	$PAGENAME = "Profile Image Upload";
	include $_SERVER["DOCUMENT_ROOT"].'/inc/header.php';
	include $_SERVER["DOCUMENT_ROOT"].'/inc/navbar.php';
?>


	<section class="container about-section">
		<div class="gap"></div>

<?php

	if (isset($_FILES['file'])) {
		$file = $_FILES['file'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];
		$file_extention = explode('.', $file_name);
		$file_extention = strtolower(end($file_extention));
		$allowed = array('jpg','JPG');
		
		if (in_array($file_extention,$allowed)) {
			if ($file_error === 0) {
				if ($file_size <= 1000000) { // 1MB
					$file_name_new = $userid. '.' .$file_extention;
					$file_destinition = $_SERVER['DOCUMENT_ROOT'].'/user/images/'.$file_name_new;
					if (move_uploaded_file($file_tmp, $file_destinition)) {
						echo "<div class='alert alert-success' role='alert'>Image Upload successfully.</div>";
					}
					else{
						echo "<div class='alert alert-warning' role='alert'>We are fetching problem in updating your information.</div>";
					}
				} else{
					echo "<div class='alert alert-warning' role='alert'>Make the image size with in 1MB.</div>";
				}
			} else{
				echo "<div class='alert alert-warning' role='alert'>Upload during file upload</div>";
			}
		} else{
			echo "<div class='alert alert-warning' role='alert'>Sorry We don't support your file type. Make it jpg.</div>";
		}
	}
?>

		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="nav nav-tabs">
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/index.php">Home</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Profile</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/updatepassword.php">Update Password</a></li>
				  <li role="presentation"  class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/profileimage.php">Upload Image</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Blogs</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog/addblog.php">Add Blog</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/delete.php">Delete Account</a></li>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Upload Your Profile Picture</h2>
				<form action="" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <input type="file" name="file" class="form-control">
				  </div>
				  <button type="submit" class="btn btn-primary" name="upload">Upload Image</button>
				</form>
			</div>
		</div>
		
    </section>


<?php
	include $_SERVER["DOCUMENT_ROOT"].'/inc/footer.php';
?>