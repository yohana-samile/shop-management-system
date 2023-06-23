<?php
    //  require_once('../../include/sidebar.php'); 
    $conn = mysqli_connect("localhost", "root", "", "shopmanagementsystem");
    $sql_query = $conn->query("SELECT producttocart.cartId, product.productName, producttocart.productQuantity, producttocart.productPrice, producttocart.status, producttocart.dateProductAddedInCart, producttocart.dateSold FROM producttocart, product WHERE 
    producttocart.product = `product`.productId AND
    `producttocart`.status = 'sold' and product.productId = {$_GET['productId']}");
    $tasks = array();
    $sn = 1;
    while( $productCategoryResult = mysqli_fetch_assoc($sql_query) ) {
        $tasks[] = $productCategoryResult;
    }
    if(isset($_POST["ExportType"])){
        @header("Content-Disposition: attachment; filename=mysql_to_excel.pdf");
    }
?>
<!-- End of Topbar -->
    
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date Time Added</th>
                                <th>Date Time Modified</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tasks as $productCategoryResult):?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $productCategoryResult['productName']; ?></td>
                                    <td><?php echo $productCategoryResult['categoryName']; ?></td>
                                    <td><?php echo $productCategoryResult['productUnit']; ?></td>
                                    <td><?php echo $productCategoryResult['productsInStock']; ?></td>
                                    <td><?php echo $productCategoryResult['productPrice']; ?></td>
                                    <td><?php echo $productCategoryResult['status']; ?></td>
                                    <td><?php echo $productCategoryResult['dateProductAdded']; ?></td>
                                    <td><?php echo $productCategoryResult['dateProductModified']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>