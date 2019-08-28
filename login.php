<?php
    $PAGENAME = "Login";
    include 'inc/header.php';
    include 'inc/navbar.php';
    
    function xss_cleaner($input_str) {
        $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
        $return_str = str_ireplace( '%3Cscript', '', $return_str );
        return $return_str;
    }
?>
    <section class="container">
      <div class="gap"></div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <form action="" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Choose Your Password" required>
              </div>
              <div class="gap"></div>
              <input  type="submit" name="submit" value="Login" class="btn btn-primary">
            </form>
            </div>
        </div>
    </section>

<?php
    include 'inc/footer.php';
?>
