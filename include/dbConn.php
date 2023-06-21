<?php
    $conn = mysqli_connect("127.0.0.1", "root", "");
    if(!$conn):
        die("connection Refused". mysqli_error($conn));
    endif;
    $selectDb = mysqli_select_db($conn, "shopmanagementsystem");
    if(!$selectDb):
        die("Database Not Selected". mysqli_error($conn));
    endif;
    session_start();
?>