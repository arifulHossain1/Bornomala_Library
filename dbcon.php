<?php
    $servername = "localhost:3307";
    $usernames = "root";
    $password = "";
    $dbname = "library";
    
    // Create connection
    $con = mysqli_connect($servername, $usernames, $password, $dbname);
    mysqli_query($con,'SET CHARACTER SET utf8');
    mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");
    // Check connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }
?>