    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">View Website</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo SCRIPT_ROOT; ?>/admin">Welcome, <?php  echo $_SESSION['username']; ?></a></li>
            <li><a href="<?php echo SCRIPT_ROOT; ?>/admin/logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo SCRIPT_ROOT; ?>/admin/blog/createblog.php">Add Blog</a></li>
                <li><a href="<?php echo SCRIPT_ROOT; ?>/admin/career/createcareer.php">Add Career</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
