<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['editProduct'])){
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productCategory = $_POST['productCategory'];
        $productUnit = $_POST['productUnit'];
        $productsInStock = $_POST['productsInStock'];
        $price = $_POST['productPrice'];

        $registerCategory = $conn->query("UPDATE `product` SET  `productName` = '$productName', `productCategory` = '$productCategory', `productUnit` = '$productUnit', `productsInStock` = '$productsInStock', `productPrice` = '$price', `dateProductModified` = current_timestamp() where `productId` = '$productId' ");
        $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'edit Product', 1, current_timestamp() ) ");
        if($registerCategory){
            $_SESSION['success'] = "Product Edited";
            header('location:../view/?key=success');
        }
        else{            
            $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To edit Product', 1, current_timestamp()) ");
            $_SESSION['error'] = "Fail In Edit, Try Again";
            header('location:../view/?key=error');
        }
    }
?>