<?php

    //connect to the database db1
    $conn=mysqli_connect('localhost','amoharr','12345','sample_db');
    session_start();

    //check connection

    if(!$conn){
        echo 'connection error !! '.mysqli_connect_error();
    }

?>