<?php
    $PAGENAME = "Register";
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
                <h2>Student Registration Form</h2>
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
                    <label for="schoole">School</label>
                    <input type="text" class="form-control" id="schoole" name="schoole" required>
                  </div>
                  <div class="form-group">
                    <label for="mailing_address">Mailing Address</label>
                    <input type="text" class="form-control" id="mailing_address" name="mailing_address" required placeholder="Your Mailing Address">
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
                  </div>
                  <div class="form-group">
                    <label for="faher_name">Father's Name</label>
                    <input type="text" class="form-control" id="faher_name" name="faher_name" placeholder="Type Your Father's Name" required>
                  </div>
                  <div class="form-group">
                    <label for="fathers_mobile_number">Father's Number</label>
                    <input type="tel" class="form-control" id="fathers_mobile_number" name="fathers_mobile_number" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="mother_name">Mother's Name</label>
                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Type Your Mother's Name" required>
                  </div>
                  <div class="form-group">
                    <label for="mothers_mobile_number">Mother's Number</label>
                    <input type="tel" class="form-control" id="mothers_mobile_number" name="mothers_mobile_number" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="guardian_name">Guardian's Name</label>
                    <input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="Type Your Guardian's Name" required>
                  </div>
                  <div class="form-group">
                    <label for="guardians_mobile_number">Guardian's Number</label>
                    <input type="tel" class="form-control" id="guardians_mobile_number" name="guardians_mobile_number" required placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="grelation">Relation with Guardian</label>
                    <input type="text" class="form-control" id="grelation" name="grelation" placeholder="Type Your Relation with Guardian" required>
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
