<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['cart'])):
        $productId = $_POST['productId'];
        $productQuantity = $_POST['productQuantity'];
        $productPrice = $_POST['productPrice'];
        $productUnit = $_POST['productUnit'];
        $currentQuantity = $_POST['currentQuantity'];
        $totalPrice  = $productPrice * $productQuantity;
        if($productQuantity > $currentQuantity):
            $_SESSION['error'] = "sorry your order is out of quantity limit";
            header('location:../../product/view/?key=error');
        else:
            $conn->query("INSERT INTO `producttocart` VALUES (null, '$productId', '$productQuantity', '$totalPrice', 'on cart', current_timestamp(), '0000-00-00 00:00:00' ) ");
            $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'add Product to card', {$_SESSION['userData']['userId']}, current_timestamp() ) ");
            if($registerCategory):
                $_SESSION['success'] = "Product added to cart";
                header('location:../view/?key=success');
            else:           
                $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To add Product', {$_SESSION['userData']['userId']}, current_timestamp()) ");
                $_SESSION['error'] = "Fail, Try Again";
                header('location:../view/?key=error');
            endif;
        endif;
    endif;
?>