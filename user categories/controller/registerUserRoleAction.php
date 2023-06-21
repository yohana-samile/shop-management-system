<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['register'])){
        $roleName = $_POST['roleName'];
        $dateAdded = $_POST['dateAdded'];
        $dateAdded = date("Y-m-d H:i:s"); 
        $dateModified = $_POST['date_modified'];
        $dateModified = '0000-00-00 00:00:00';

        $conn->query("INSERT INTO `userrole` VALUES (null, '$roleName', '$dateAdded', '$dateModified') ");
        $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'Register New user Role', '1', '$dateAdded') ");
        if($registerCategory){
            $_SESSION['success'] = "New Category Product Registered";
            header('location:../view/index.php?key=success');
        }
        else{            
            $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To Register New user Role', '1', current_timestamp()) ");
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:../view/index.php?key=error');
        }
    }
?>