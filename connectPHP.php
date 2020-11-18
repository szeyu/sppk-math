<?php
        
        $host = "localhost";
        $user =  "root";
        $password = "";
        $db = "sppk math";

        $con = mysqli_connect($host,$user,$password,$db);   //connect to localhost server

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();    //show errror if unable to connect
            exit();
        }
?>