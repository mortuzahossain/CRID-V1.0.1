<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }
    $userid =$_SESSION['id'];

	$PAGENAME = "Add Blog";
	include $_SERVER["DOCUMENT_ROOT"].'/inc/header.php';
	include $_SERVER["DOCUMENT_ROOT"].'/inc/navbar.php';
?>


	<section class="container about-section">
		<div class="gap"></div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="nav nav-tabs">
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/index.php">Home</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/update.php">Update Profile</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/updatepassword.php">Update Password</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/profileimage.php">Upload Image</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog">Blogs</a></li>
				  <li role="presentation"  class="active"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog/addblog.php">Add Blog</a></li>
				  <li role="presentation"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/delete.php">Delete Account</a></li>
				</ul>
			</div>
		</div>

<?php
if (isset($_POST['save'])) {
  $title = strip_tags($_POST['title']);
  $body = $_POST['body'];

  $insertquery = "INSERT INTO blogs (title,body,uid) VALUES ('$title','$body',$userid)";
  if (mysqli_query($con,$insertquery)) {
    // $locationurl =SCRIPT_ROOT. '/user/blog/index.php';
    // header('Location: '.$locationurl);
    // exit();
    echo "<div class='alert alert-success' role='alert'>Blog Post sucessfully.</div>";
  } else {
    echo "<div class='alert alert-warning' role='alert'>We are fetching problem during post your content.</div>";
  }
}
?>



		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Add new blog</h2>
				<form method="post" accept="">
				  <div class="form-group">
				    <label for="title">Title</label>
				    <input type="title" class="form-control" id="title" placeholder="" name="title">
				  </div>
				  <div class="form-group">
				    <label for="content">Content</label>
				    <textarea class="form-control" name="body"></textarea>
				  </div>
				  <button type="submit" class="btn btn-primary" name="save">Post</button>
				</form>
			</div>
		</div>
		
    </section>

<script src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('body');
  </script>
<?php
	include $_SERVER["DOCUMENT_ROOT"].'/inc/footer.php';
?>