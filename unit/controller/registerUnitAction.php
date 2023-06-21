<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['register'])):
        $unitName = $_POST['unitName'];
        $addedBy = $_POST['addedBy'];
        
        $registerUnit = $conn->query("INSERT INTO `productUnit` (`unitId`, `unitName`, `addedBy`, `dateAdded`, `timeModified`) VALUES (NULL, '$unitName', '$addedBy', current_timestamp(), '0000-00-00 00:00:00') ");
        if($registerUnit):
            $_SESSION['success'] = "Unit Added";
            header('location:../view/?key=success');
        else:           
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:../view/?key=error');
        endif;

    // deletion
    elseif(isset($_GET['deleteUnit'])):
        $deleteUnit = $conn->query("DELETE FROM productUnit where unitId = {$_GET['deleteUnit']}");
        if($deleteUnit):
            $_SESSION['success'] = "Unit Deleted";
            header('location:../view/?key=success');
        else:           
            $_SESSION['error'] = "Fail, Try Again";
            header('location:../view/?key=error');
        endif;
    // edit
    elseif(isset($_POST['editUnit'])):
        $unitId = $_POST['unitId'];
        $unitName = $_POST['unitName'];
        $deleteUnit = $conn->query("UPDATE productUnit SET unitName = '$unitName', timeModified = current_timestamp() where unitId = '$unitId' ");
        if($deleteUnit):
            $_SESSION['success'] = "Unit Updated";
            header('location:../view/?key=success');
        else:           
            $_SESSION['error'] = "Fail, Try Again";
            header('location:../view/?key=error');
        endif;
    endif;
?>