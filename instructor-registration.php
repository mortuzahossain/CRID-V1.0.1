<?php
    $PAGENAME = "Instructor Registration";
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
        $mailing_address = xss_cleaner(htmlspecialchars($_POST['mailing_address']));
        $zipcode = xss_cleaner(htmlspecialchars($_POST['zipcode']));
        $city = xss_cleaner(htmlspecialchars($_POST['city']));
        $contact_number = xss_cleaner(htmlspecialchars($_POST['contact_number']));
        $dob = xss_cleaner(htmlspecialchars($_POST['dob']));
        $email = xss_cleaner(htmlspecialchars($_POST['email']));
        $nid = xss_cleaner(htmlspecialchars($_POST['nid']));
        $previous_experiance = xss_cleaner(htmlspecialchars($_POST['previous_experiance']));
        $occupation = xss_cleaner(htmlspecialchars($_POST['occupation']));
        $other_information = xss_cleaner(htmlspecialchars($_POST['other_information']));
        $language = xss_cleaner(htmlspecialchars($_POST['language']));
        $class_time = $_POST['class_time'];
        $convicted_with_violation = xss_cleaner(htmlspecialchars($_POST['convicted_with_violation']));
        $health_problem = xss_cleaner(htmlspecialchars($_POST['health_problem']));
        $emergency_contact = xss_cleaner(htmlspecialchars($_POST['emergency_contact']));
        $emergency_contact_number = xss_cleaner(htmlspecialchars($_POST['emergency_contact_number']));

        $class_time = join(",",$class_time);
        
        // $ctime = xss_cleaner($_POST['ctime']);

        // id, name, mailing_address, zipcode, city, contact_number, dob, email, nid, previous_experiance, occupation, other_information, language, class_time, convicted_with_violation, health_problem, emergency_contact, emergency_contact_number

        $sql = "INSERT INTO instructors_registration (name, mailing_address, zipcode, city, contact_number, dob, email, nid, previous_experiance, occupation, other_information, language, class_time, convicted_with_violation, health_problem, emergency_contact, emergency_contact_number) VALUES ('$name','$mailing_address', '$zipcode', '$city', '$contact_number', '$dob', '$email', '$nid', '$previous_experiance', '$occupation', '$other_information', '$language', '$class_time', '$convicted_with_violation', '$health_problem', '$emergency_contact', '$emergency_contact_number')";

        if (mysqli_query($con,$sql)) {
            echo "<div class='alert alert-success' role='alert'>WOW !!! Your registration is complete We will come back to you soon.</div>";
        } else {
            echo "<div class='alert alert-warning' role='alert'>We are fetching problem in registering you. PLease make sure you are registering first time. Or please contact us.</div>";
        }

        // echo $sql;
    }

?>
                
                <h2 class="text-center">Instructor Registration Form</h2>
                <hr>
                <div class="gap"></div>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="mailing_address">Mailing Address</label>
                    <input type="text" class="form-control" id="mailing_address" name="mailing_address" required>
                  </div>
                  <div class="form-group">
                    <label for="zipcode">Zip Code</label>
                    <input type="number" class="form-control" id="zipcode" name="zipcode" required>
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                  </div>
                  <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="tel" class="form-control" id="contact_number" name="contact_number" required >
                  </div>
                  <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required >
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="nid">NID</label>
                    <input type="text" class="form-control" id="nid" name="nid"  required>
                  </div>
                  <div class="form-group">
                    <label for="previous_experiance">Previous Experience</label>
                    <input type="text" class="form-control" id="previous_experiance" name="previous_experiance" required >
                  </div>
                  <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input type="text" class="form-control" id="occupation" name="occupation"required>
                  </div>
                  <div class="form-group">
                    <label for="other_information">Other information that will help us make a good match (such as education, general interests/hobbies, any projects)</label>
                    <input type="text" class="form-control" id="other_information" name="other_information" required >
                  </div>
                  <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" class="form-control" id="language" name="language" required>
                  </div>

                  <label for="">Checkboxes *</label>
                  <div class="form-check">
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="Morning (Mon-Fri)" id="Morning">
                      <label class="form-check-label" for="Morning">
                        Morning (Mon-Fri)
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="Afternoon (Mon-Fri)" id="Afternoon">
                      <label class="form-check-label" for="Afternoon">
                        Afternoon (Mon-Fri)
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="Evening (Mon-Fri)" id="Evening">
                      <label class="form-check-label" for="Evening">
                        Evening (Mon-Fri)
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="Weekends" id="Weekends">
                      <label class="form-check-label" for="Weekends">
                        Weekends
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="Once a Week" id="Once_a_Week">
                      <label class="form-check-label" for="Once_a_Week">
                        Once a Week
                      </label> <br>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="More than Once a Week" id="More_than_Once_a_Week">
                      <label class="form-check-label" for="More_than_Once_a_Week">
                        More than Once a Week
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="One Time Only" id="One_Time_Only">
                      <label class="form-check-label" for="One_Time_Only">
                        One Time Only
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="as Needed" id="as_Needed">
                      <label class="form-check-label" for="as_Needed">
                        as Needed
                      </label>
                      <input class="form-check-input" name="class_time[]" type="checkbox" value="Other" id="Other">
                      <label class="form-check-label" for="Other">
                        Other
                      </label>
                  </div>
                  <br>
                  
                  <div class="form-group">
                    <label for="convicted_with_violation">Have You Ever Been Convicted For Violation Of Any Laws, Traffic Or Otherwise? *</label>
                    <input type="text" class="form-control" id="convicted_with_violation" name="convicted_with_violation" required>
                  </div>
                  <div class="form-group">
                    <label for="health_problem">Do You Have Any Physical Condition that May Limit Your Activities? *</label>
                    <input type="text" class="form-control" id="health_problem" name="health_problem" required>
                  </div>
                  <div class="form-group">
                    <label for="emergency_contact">Who to notify In case of an Emergency?</label>
                    <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" required>
                  </div>
                  <div class="form-group">
                    <label for="emergency_contact_number">Emergency Contact Number</label>
                    <input type="tel" class="form-control" id="emergency_contact_number" name="emergency_contact_number" required>
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
