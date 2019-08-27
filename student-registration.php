<?php
    $PAGENAME = "Student Registration";
    include 'inc/header.php';
    include 'inc/navbar.php';
    
    function xss_cleaner($input_str) {
        $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
        $return_str = str_ireplace( '%3Cscript', '', $return_str );
        return $return_str;
    }
?>
    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="gap"></div>

<?php
if (isset($_POST['submit'])) {
        $name = xss_cleaner(htmlspecialchars($_POST['name']));
        $gender = xss_cleaner(htmlspecialchars($_POST['gender']));
        $grade = xss_cleaner(htmlspecialchars($_POST['grade']));
        $school = xss_cleaner(htmlspecialchars($_POST['school']));
        $mailing_address = xss_cleaner(htmlspecialchars($_POST['mailing_address']));
        $mobile_number = xss_cleaner(htmlspecialchars($_POST['mobile_number']));
        $email = xss_cleaner(htmlspecialchars($_POST['email']));
        $father_name = xss_cleaner(htmlspecialchars($_POST['father_name']));
        $father_mobile = xss_cleaner(htmlspecialchars($_POST['father_mobile']));
        $mother_name = xss_cleaner(htmlspecialchars($_POST['mother_name']));
        $mother_mobile = xss_cleaner(htmlspecialchars($_POST['mother_mobile']));
        $guardian_name = xss_cleaner(htmlspecialchars($_POST['guardian_name']));
        $guardian_number = xss_cleaner(htmlspecialchars($_POST['guardian_number']));
        $relation_with_guardian = xss_cleaner(htmlspecialchars($_POST['relation_with_guardian']));
        $health_problem = xss_cleaner(htmlspecialchars($_POST['health_problem']));
        $medication = xss_cleaner(htmlspecialchars($_POST['medication']));

        // Search in database if the student is already added or not then show worning
        $sql = "SELECT id FROM students_registration WHERE name ='$name' AND father_name = '$father_name' AND email = '$email' LIMIT 1";
        $result = mysqli_query($con,$sql);
        // echo $sql;
        // echo mysqli_num_rows($result);
        if (!mysqli_num_rows($result)) {
            $sql = "INSERT INTO students_registration (name,gender,grade,school,mailing_address,mobile_number,email,father_name,father_mobile,mother_name,mother_mobile,guardian_name,guardian_number,relation_with_guardian,health_problem,medication) VALUES ('$name','$gender','$grade','$school','$mailing_address','$mobile_number','$email','$father_name','$father_mobile','$mother_name','$mother_mobile','$guardian_name','$guardian_number','$relation_with_guardian','$health_problem','$medication')";
            // echo $sql;
            if (mysqli_query($con,$sql)) {
                echo "<div class='alert alert-success' role='alert'>WOW !!! Your registration is complete We will come back to you soon.</div>";
            } else {
                echo "<div class='alert alert-warning' role='alert'>Sorry!! The problem is in our end. Please try again. We are tring to fix it.</div>";
            }
        } else {
            echo "<div class='alert alert-warning' role='alert'>We are fetching problem in registering you. PLease make sure you are registering first time. Or please contact us.</div>";
        }
    }

?>

                <h2 class="text-center">Student Registration Form</h2>
                <hr>
                <div class="gap"></div>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Type Your name" required>
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label><br>
                    <input type="radio" name="gender" value="Male" required="1">   Male <br>
                    <input type="radio" name="gender" value="Female" required="1">   Female<br>
                  </div>
                  <div class="form-group">
                    <label for="grade">Grade/Class</label>
                    <input type="text" class="form-control" id="grade" name="grade" required>
                  </div>
                  <div class="form-group">
                    <label for="school">School</label>
                    <input type="text" class="form-control" id="school" name="school" required>
                  </div>
                  <div class="form-group">
                    <label for="mailing_address">Mailing Address</label>
                    <input type="text" class="form-control" id="mailing_address" name="mailing_address" required placeholder="Your Mailing Address">
                  </div>
                  <div class="form-group">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobile_number" name="mobile_number" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
                  </div>
                  <div class="form-group">
                    <label for="father_name">Father's Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Type Your Father's Name" required>
                  </div>
                  <div class="form-group">
                    <label for="father_mobile">Father's Number</label>
                    <input type="tel" class="form-control" id="father_mobile" name="father_mobile" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="mother_name">Mother's Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Type Your Mother's Name" required>
                  </div>
                  <div class="form-group">
                    <label for="mother_mobile">Mother's Number</label>
                    <input type="tel" class="form-control" id="mother_mobile" name="mother_mobile" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="guardian_name">Guardian's Name</label>
                    <input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="Type Your Guardian's Name" required>
                  </div>
                  <div class="form-group">
                    <label for="guardian_number">Guardian's Number</label>
                    <input type="tel" class="form-control" id="guardian_number" name="guardian_number" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="relation_with_guardian">Relation with Guardian</label>
                    <input type="text" class="form-control" id="relation_with_guardian" name="relation_with_guardian" placeholder="Type Your Relation with Guardian" required>
                  </div>
                  <div class="form-group">
                    <label for="health_problem">Specify any of your child’s health problems</label>
                    <input type="text" class="form-control" id="health_problem" name="health_problem" placeholder="Type N/A if not applicable." required>
                  </div>
                  <div class="form-group">
                    <label for="medication">Is your child on any medication? If so, please specify</label>
                    <input type="text" class="form-control" id="medication" name="medication" placeholder="Type N/A if not applicable." required>
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
