<?php
    $PAGENAME = "Contact Us";
    include 'inc/header.php';
    include 'inc/navbar.php';
?>

    <section class="container about-section">
        <h1 class="animated text-center">Contact Us</h1>
        <hr>
        <p>
            You can also join us as a student, robotic learner, mentor or a professional volunteer to help support our campaign on robotic and IoT Education. Learn, tech and grow, let’s build a robot builders community.
        </p>
        <div class="gap">

          <div class="row">
            <div class="col-md-6">
              <form action="thanks.php" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject for the message" required>
              </div>
              <div class="form-group">
                <label for="text">Message</label>
                <textarea class="form-control" rows="5" id="text" name="message" placeholder="Message that you want to send us"></textarea>
              </div>
              <input  type="submit" name="submit" value="Send Message" class="btn btn-primary">
            </form>




            </div>
            <div class="col-md-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1535.419689761554!2d90.3747300839194!3d23.752227323309185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ad46174c4d%3A0x37bad91ff333f2b5!2sDhaka+Ahsania+Mission!5e0!3m2!1sen!2sbd!4v1563680079372!5m2!1sen!2sbd" height="450px" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
            
    </section>


<?php include 'inc/footer.php'; ?>