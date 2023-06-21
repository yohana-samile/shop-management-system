<?php
    require_once('../../include/dbConn.php');
    if(isset($_POST['editOrder'])):
        $cartId = $_POST['cartId'];
        $currentQuantity = $_POST['currentQuantity'];
        $newQuantity = $_POST['newQuantity'];
        $productPrice = $_POST['productPrice'];
       
        if($newQuantity > $currentQuantity):
            $totalPrice  = $newQuantity * $productPrice / $currentQuantity;
            $conn->query("UPDATE `producttocart` SET productPrice = '$totalPrice', productQuantity = '$newQuantity' where cartId = '$cartId' ");
            $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'order modification', {$_SESSION['userData']['userId']}, current_timestamp() ) ");
            if($registerCategory):
                $_SESSION['success'] = "order to cart modified";
                header('location:../view/?key=success');
            else:        
                $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To Change Order', {$_SESSION['userData']['userId']}, current_timestamp()) ");
                $_SESSION['error'] = "Fail, Try Again";
                header('location:../view/?key=error');
            endif;        
        elseif($newQuantity < $currentQuantity):
            if($newQuantity > 0):
                $initialPrice = $productPrice / $currentQuantity;
                $differenceBetweenPrice = $currentQuantity - $newQuantity;
                $totalPrice = ($currentQuantity - $differenceBetweenPrice) * $initialPrice;
                $conn->query("UPDATE `producttocart` SET productPrice = '$totalPrice', productQuantity = '$newQuantity' where cartId = '$cartId' ");
                $registerCategory = $conn->query("INSERT INTO `systemlogs` VALUES (null, 'order modification', {$_SESSION['userData']['userId']}, current_timestamp() ) ");
                if($registerCategory):
                    $_SESSION['success'] = "order to cart modified";
                    header('location:../view/?key=success');
                else:            
                    $conn->query("INSERT INTO systemlogs VALUES(NULL, 'Fail To Change Order', {$_SESSION['userData']['userId']}, current_timestamp()) ");
                    $_SESSION['error'] = "Fail, Try Again";
                    header('location:../view/?key=error');
                endif;
            else:       
                $_SESSION['error'] = "No modification, Nothing to update";
                header('location:../view/?key=warning');
            endif;
        elseif($newQuantity == $currentQuantity):
            $_SESSION['error'] = "No modification, Nothing to update";
            header('location:../view/?key=warning');
        else:
            $_SESSION['error'] = "Something went wrong try again";
            header('location:../view/?key=warning');
        endif;
    endif;
?>