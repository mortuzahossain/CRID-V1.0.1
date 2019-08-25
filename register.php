<?php
    $PAGENAME = "Register";
    include 'inc/header.php';
    include 'inc/navbar.php';
    
    function xss_cleaner($input_str) {
        $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
        $return_str = str_ireplace( '%3Cscript', '', $return_str );
        return $return_str;
    }




/*    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        if (!empty($name) and !empty($email) and !empty($subject) and !empty($message)) {
          $sql = "INSERT INTO contactus (name, email, subject, message) VALUES ('$name','$email','$subject','$message')";
          if (!mysqli_query($con,$sql)) {
            echo "<p class='text-center bg-danger'>Error !! Please try again another time.</p>";
          }
        } else {
          echo "<p class='text-center bg-danger'>Please Fill the form and then submit again.</p>";
        }
    } else {
        echo '<script>document.location.replace("index.php");</script>';
    }*/
?>
    <section class="container">
<p></p>


<?php
    if (isset($_POST['submit'])) {
        $name = xss_cleaner(htmlspecialchars($_POST['name']));
        $email = xss_cleaner(htmlspecialchars($_POST['email']));
        $password = md5($_POST['password']);
        $confirm_password = md5($_POST['confirm_password']);
        $gender = xss_cleaner(htmlspecialchars($_POST['gender']));
        $account_type = xss_cleaner(htmlspecialchars($_POST['account_type']));

        if ($password !== $confirm_password) {
            echo "<div class='alert alert-warning' role='alert'>Password Are Not Same. PLease Try Again</div>";
        } else {
            $sql = "INSERT INTO users (name,email,password,gender,account_type) VALUES ('$name','$email','$password','$gender','$account_type')";
            if (mysqli_query($con,$sql)) {
                echo "<div class='alert alert-success' role='alert'>Registration Complete. Please Login Now.</div>";
            } else {
                echo "<div class='alert alert-warning' role='alert'>We are fetching problem in registering you. PLease check your email again.</div>";
            }
        }

    }
?>

        <div class="row">
            <div class="col-md-6">
                <h2>Register now</h2>
                <hr>
                <p>
                    <h4>আইডিয়া সাবমিট করুন</h4>
আপনি কি একজন সফল উদ্ভাবক হতে চান? আপনার কি ইউনিক কোন আইডিয়া আছে যা মানুষের সমস্যার সমাধান দিবে? আপনি কি কোন সমস্যার সমাধান চান? তাহলে আপনার অইডিয়া সাবমিট করুন।<br>

<h4>ডিজাইন সাবমিট করুন</h4>
আপনার কি প্রোটোটাইপ আছে? প্রোটোটাইপের সমস্যা নিরূপণ করে সমাধান করতে চান? তাহলে প্রোটোটাইপের ডিজাইন সাবমিট করে সমস্যার কথা জানান।<br>

<h4>যোগাযোগের জন্য অপেক্ষা করুন</h4>
আইডিয়া আথবা আইডিয়া সহ প্রোটোটাইপের ডিজাইন সাবমিট করে অপেক্ষা করুন।
                </p>
            </div>
            <div class="col-md-6">
                <div class="gap"></div>

            <form action="" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Type Your name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Choose Your Password" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Type Your Password again" required>
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
              <div class="gap"></div>
              <input  type="submit" name="submit" value="Register" class="btn btn-primary">
            </form>
            </div>
        </div>
    </section>

<?php
    include 'inc/footer.php';
?>
