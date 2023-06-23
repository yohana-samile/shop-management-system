<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['register'])){
        $categoryName = $_POST['categoryName'];
        $addedBy = $_POST['addedBy'];
        $dateCategoryAdded = $_POST['dateCategoryAdded'];
        $dateCategoryAdded = date("Y-m-d H:i:s"); 
        $dateCategoryModified = $_POST['date_modified'];
        $dateCategoryModified = '0000-00-00 00:00:00';

        $conn->query("INSERT INTO `productcategory` VALUES (null, '$categoryName', '$addedBy', '$dateCategoryAdded', '$dateCategoryModified') ");
        $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'Register Product Category', '$addedBy', '$dateCategoryAdded') ");
        if($registerCategory){
            $_SESSION['success'] = "New Category Product Registered";
            header('location:../view/?key=success');
        }
        else{            
            $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To Register Product Category', '$addedBy', current_timestamp()) ");
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:../view/?key=error');
        }
    }
?>