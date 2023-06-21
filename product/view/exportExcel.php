<?php
    $conn = mysqli_connect("localhost", "root", "", "shopmanagementsystem");

    $filename = "alice-samileCsv.csv";
    $fp = fopen('php://output', 'w');
    $tableschema = 'php_csv_export';
    $sql_query = $conn->query("SELECT product.productName, product.productCategory, product.productUnit, product.productsInStock, product.productPrice, product.status, product.productRegisteredBy, product.dateProductAdded, product.dateProductModified FROM `product`");
    $tasks = array();
    while($productCategoryResult = mysqli_fetch_assoc($sql_query) ) {
        $tasks[] = $productCategoryResult;
    }
    header('Content-type: application/csv');
    header('Content-Disposition: attachment; filename=' . $filename);
    fputcsv($fp, $tasks);
    $sql_query = $conn->query("SELECT product.productName, product.productCategory, product.productUnit, product.productsInStock, product.productPrice, product.status, product.productRegisteredBy, product.dateProductAdded, product.dateProductModified FROM `product`");
    $tasks = array();
    while($productCategoryResult = mysqli_fetch_assoc($sql_query) ) {
        fputcsv($fp, $productCategoryResult);
        // header('location:index.php');
    }
    exit();
?>