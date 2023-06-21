<?php
    require_once('include/dbConn.php');
    $setLogs = $conn->query("INSERT INTO systemlogs VALUES (null, 'logout', {$_SESSION['userData']['userId']},	current_timestamp() ) ");
    if($setLogs):  
        session_unset();
        session_destroy();
        header('location:index.php');
    endif;