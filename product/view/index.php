<?php
     require_once('../../include/sidebar.php'); 
    $conn = mysqli_connect("localhost", "root", "", "shopmanagementsystem");
    $sql_query = $conn->query("SELECT * FROM product, productUnit, productcategory WHERE
        product.productCategory = productcategory.categoryId AND
        product.productUnit = productUnit.unitId ");
    $tasks = array();
    $sn = 1;
    while( $productCategoryResult = mysqli_fetch_assoc($sql_query) ) {
        $tasks[] = $productCategoryResult;
    }
?>
<!-- End of Topbar -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php
                require_once('../../include/messages.php');
                if(isset($_GET['key'])){}
            ?>
            <h6 class="m-0 font-weight-bold text-primary">Product </h6>
            <div class="row float-right">
                <?php if($_SESSION['userData']['roleName'] == 'administrator' || $_SESSION['userData']['roleName'] == 'owner' || $_SESSION['userData']['roleName'] == 'storekeepers'): ?>
                    <div class="col-md-4">
                        <!-- export ecxel -->
                        <a href="exportExcel.php" class="btn btn-sm btn-success text-white float-right">export excel</a>
                    </div>
                    <!-- Upload excel file -->
                    <div class="col-md-4">
                        <a href="" data-toggle="modal" data-target="#uploadExcel" class="btn btn-sm btn-primary text-white float-right">Upload excel</a>
                    </div>
                <?php endif; 
                if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                    <div class="col-md-4">
                        <a href="" data-toggle="modal" data-target="#newProduct" class="btn btn-sm btn-primary text-white float-right">New Product <i class="fa fa-plus"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
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
                            <th>addedBy-you</th>
                            <th>Date Time Added</th>
                            <th>Date Time Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tasks as $productCategoryResult):?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $productCategoryResult['productName']; ?></td>
                                <td><?php echo $productCategoryResult['categoryName']; ?></td>
                                <td><?php echo $productCategoryResult['productUnit']. " " .$productCategoryResult['unitName']; ?></td>
                                <td><?php echo $productCategoryResult['productsInStock']; ?></td>
                                <td><?php echo $productCategoryResult['productPrice']; ?></td>
                                <td><?php echo $productCategoryResult['status']; ?></td>
                                <td class="text-center"><i class="fa fa-toggle-on text-center text-primary"></i></td>
                                <td><?php echo $productCategoryResult['dateProductAdded']; ?></td>
                                <td><?php echo $productCategoryResult['dateProductModified']; ?></td>
                                <td>
                                    <?php if($_SESSION['userData']['roleName'] == 'administrator' || $_SESSION['userData']['roleName'] == 'cashier'): 
                                                if($productCategoryResult['productsInStock'] > 0): ?>
                                                    <a href="" data-toggle="modal" data-target="#addToCart<?php echo $productCategoryResult['productId']; ?>" ><i class="fa fa-plus text-primary"></i></a>
                                    <?php endif; endif; 
                                        if($_SESSION['userData']['roleName'] == 'administrator' || $_SESSION['userData']['roleName'] == 'manager'): ?>
                                            <a href="" data-toggle="modal" data-target="#editProduct<?php echo $productCategoryResult['productId']; ?>" ><i class="fa fa-edit text-primary"></i></a>
                                            <i class="fa fa-trash text-danger"></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php include('../modal/editProduct.php'); 
                                include('../modal/addProductToCart.php');
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('../modal/uploadExcelModal.php'); ?>
<?php require_once('../modal/newProduct.php'); ?>
<?php require_once('../../include/footer.php'); ?>