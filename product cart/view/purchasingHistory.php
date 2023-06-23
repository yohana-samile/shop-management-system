<?php require_once('../../include/sidebar.php'); ?>
    <!-- End of Topbar -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <?php
                    require_once('../../include/messages.php');
                    if(isset($_GET['key'])){}
                ?>
                <h6 class="m-0 font-weight-bold text-primary">Purchasing History </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Product Name</th>
                                <th>Quantity parchesed</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Date orderd</th>
                                <th>Date sold</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                $getProductCategoryRecord = $conn->query("SELECT product.productId, producttocart.cartId, product.productName, producttocart.productQuantity, producttocart.productPrice, producttocart.status, producttocart.dateProductAddedInCart, producttocart.dateSold FROM producttocart, product WHERE 
                                    producttocart.product = `product`.productId AND
                                    `producttocart`.status = 'sold' ");
                                if(mysqli_num_rows($getProductCategoryRecord) > 0):
                                    while($productCategoryResult = mysqli_fetch_array($getProductCategoryRecord)): ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $productCategoryResult['productName']; ?></td>
                                            <td><?php echo $productCategoryResult['productQuantity']; ?></td>
                                            <td><?php echo $productCategoryResult['productPrice']; ?></td>
                                            <td><?php echo $productCategoryResult['status']; ?></td>
                                            <td><?php echo $productCategoryResult['dateProductAddedInCart']; ?></td>
                                            <td><?php echo $productCategoryResult['dateSold']; ?></td>
                                            <td>
                                                <?php if($_SESSION['userData']['roleName'] == 'administrator' || $_SESSION['userData']['roleName'] == 'cashier'): ?>
                                                    <form hidden action="ex.php?productId=<?php echo $productCategoryResult['productId']; ?>" method="post">
                                                        <input type="hidden" value="" id="hidden-type" name="ExportToExcel" />
                                                        <input type="submit" name="ExportType" class="btn btn-success text-white float-right" value="generate pdf">
                                                </form>
                                                    <small><a onclick="printAppoitment()" class="btn btn-primary text-white">Print Reciept <i class="fa fa-print"></i></a></small>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                            <?php endwhile; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="" hidden>
        <div id="printAppoitment">
            <?php 
                $get = $conn->query("SELECT product.productId, producttocart.cartId, product.productName, producttocart.productQuantity, producttocart.productPrice, producttocart.status, producttocart.dateProductAddedInCart, producttocart.dateSold FROM producttocart, product WHERE 
                producttocart.product = `product`.productId AND
                `producttocart`.status = 'sold' ");
                $data = mysqli_fetch_assoc($get);
                
            ?>
            <h2>This is Your Reciept</h2>
            <hr>
            <tr>
                <td><?php echo $data['productName']; ?></td><br>
                <hr>
                <td><?php echo $data['productQuantity']; ?></td><br>
                <hr>
                <td><?php echo $data['productPrice']; ?></td><br>
                <hr>
                <td><?php echo $data['status']; ?></td><br>
                <hr>
                <td><?php echo $data['dateProductAddedInCart']; ?></td><br>
                <hr>
                <td><?php echo $data['dateSold']; ?></td><br>
            </tr>
            <hr>
            <h3>Thank you for using our service</h3>
        </div>
    </div>
<?php require_once('../../include/footer.php'); ?>