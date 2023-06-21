<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['register'])){
        $productName = $_POST['productName'];
        $productCategory = $_POST['productCategory'];
        $productUnit = $_POST['productUnit'];
        $productsInStock = $_POST['productsInStock'];
        $productRegisteredBy = $_POST['productRegisteredBy'];
        $price = $_POST['productPrice'];

        $conn->query("INSERT INTO `product` VALUES (null, '$productName', '$productCategory', '$productUnit', '$productsInStock', '$price', 'on stock', '$productRegisteredBy', current_timestamp(), '0000-00-00 00:00:00') ");
        $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'Register Product ', '$productRegisteredBy', current_timestamp() ) ");
        if($registerCategory){
            $_SESSION['success'] = "New Product Registered";
            header('location:../view/index.php?key=success');
        }
        else{            
            $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To Register Product', '$productRegisteredBy', current_timestamp()) ");
            $_SESSION['error'] = "Fail In Registration, Try Again";
            header('location:../view/index.php?key=error');
        }
    }
?>