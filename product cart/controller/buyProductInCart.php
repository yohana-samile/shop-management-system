<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['buy'])):
        $cartId = $_POST['cartId'];        
        $productId = $_POST['productId']; 
        //qunatity from product table
        $getQuanityFromProduct = $conn->query("SELECT productsInStock FROM `product` where productId = '$productId'");
        $newQuantity = mysqli_fetch_array($getQuanityFromProduct);
        
        //qunatity from product  to cart table
        $getQuanityFfromCart = $conn->query("SELECT productQuantity FROM `producttocart` where cartId = '$cartId'");
        $totalQuantitySold = mysqli_fetch_array($getQuanityFfromCart);

        $result = $newQuantity['productsInStock'] - $totalQuantitySold['productQuantity'];

        $conn->query("UPDATE `producttocart` SET status = 'sold', dateSold = current_timestamp() where cartId = '$cartId' ");
        $sellProductOnCart = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'Sell product', {$_SESSION['userData']['userId']}, current_timestamp() ) ");
        if($sellProductOnCart):
            if($result == 0):
                $conn->query("UPDATE `product` SET productsInStock = '$result', status = 'out of stock' where productId = '$productId' ");
                $_SESSION['success'] = "Product sold successfully, thank you";
                header('location:../view/?key=success');
            else:
                $conn->query("UPDATE `product` SET productsInStock = '$result' where productId = '$productId' ");
                $_SESSION['success'] = "Product sold successfully, thank you";
                header('location:../view/?key=success');
            endif;
        else:       
            $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To sell product', {$_SESSION['userData']['userId']}, current_timestamp()) ");
            $_SESSION['error'] = "Fail, Try Again";
            header('location:../view/?key=error');
        endif;          
    endif;
?>