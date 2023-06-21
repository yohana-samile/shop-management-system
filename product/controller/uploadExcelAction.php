<?php
    $conn = mysqli_connect("localhost", "root", "", "shopmanagementsystem");
    if(isset($_POST["submit_file"])):
        $file = $_FILES["file"]["tmp_name"];
        $file_open = fopen($file,"r");
        while(($csv = fgetcsv($file_open, 1000, ",")) !== false):
            $productName = $csv[0];
            $productCategory = $csv[1];
            $productUnit = $csv[2];
            $productsInStock = $csv[3];
            $productPrice = $csv[4];
            $status = $csv[5];
            $productRegisteredBy = $csv[6];
            $dateProductAdded = $csv[7];
            $dateProductModified = $csv[8];
        endwhile;
        $uploadExcel = $conn->query("INSERT INTO `product` (`productId`, `productName`, `productCategory`, `productUnit`, `productsInStock`, `productPrice`, `status`, `productRegisteredBy`, `dateProductAdded`, `dateProductModified`)
            VALUES (null, '$productName', '$productCategory', '$productUnit', '$productsInStock', '$productPrice', '$status', '$productRegisteredBy', '$dateProductAdded', '$dateProductModified') ");
        if($uploadExcel):
            $_SESSION['success'] = "Excel Uploaded";
             header('location:../view/?key=success');
        endif;
    endif;
?>