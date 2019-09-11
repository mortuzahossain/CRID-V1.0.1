<?php

    include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
    include $_SERVER["DOCUMENT_ROOT"].'/admin/inc/constants.php';

    if (!isset($_GET['id'])) {
      echo '<script>document.location.replace("index.php");</script>';
      exit();
    } else {
      $id = $_GET['id'];
    }


    $deletesql = "UPDATE careers SET status = 0 WHERE id = $id";
    if (mysqli_query($con,$deletesql)) {
      $locationurl =SCRIPT_ROOT. '/admin/career/career.php';
      header('Location: '.$locationurl);
      exit();
    } else {
      echo "Error During Deleting Data. Please Try again";
    }

?>