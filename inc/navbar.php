<header class="navbar navbar-inverse navbar-fixed-top " role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
             <a class="navbar-brand" href="/"><h1>CRID-DAM ROBOTIC LABS</h1></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/">Home</a></li>
                <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/training.php">Training</a></li>
                <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/rbcommunity.php">Community</a></li>
                <?php if (isset($_SESSION['id'])) { ?>
                    <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/blog/">Blog</a></li>
                <?php } ?>
                <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/aboutus.php">About Us</a></li>
                <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/contactus.php">Contact</a></li>
                <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/career.php">Career</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <?php if (!isset($_SESSION['id'])) { ?>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/login.php">Login</a></li>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/register.php">Signup</a></li>
                        <?php } else { ?>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/">Account</a></li>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/user/blog/">Blog</a></li>
                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/logout.php">Logout</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>