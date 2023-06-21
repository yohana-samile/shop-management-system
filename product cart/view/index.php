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
                <h6 class="m-0 font-weight-bold text-primary">Product </h6>
                <a href="" data-toggle="modal" data-target="#newProduct" class="btn btn-primary text-white float-right">Buy All</a>
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
                                $getProductCategoryRecord = $conn->query("SELECT product.productId,producttocart.cartId, product.productName, producttocart.productQuantity, producttocart.productPrice, producttocart.status, producttocart.dateProductAddedInCart, producttocart.dateSold FROM producttocart, product WHERE 
                                    producttocart.product = `product`.productId AND
                                    `producttocart`.status = 'on cart' ");
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <form action="../controller/buyProductInCart.php" method="post">
                                                            <input type="number" name="cartId" value="<?php echo $productCategoryResult['cartId']; ?>" class="form-control" hidden placeholder="produc" required>
                                                            <input type="number" name="productId" value="<?php echo $productCategoryResult['productId']; ?>" class="form-control" hidden placeholder="produc" required>
                                                            <button name="buy" class="btn btn-primary text-white">Buy</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <small><a href="" data-toggle="modal" data-target="#editOrder<?php echo $productCategoryResult['cartId']; ?>" ><i class="fa fa-edit text-primary"></i></a></small>
                                                        <?php if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                                                            <small><i class="fa fa-trash text-danger"></i></small>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- editOrder modal -->
                                        <div class="modal fade" id="editOrder<?php echo $productCategoryResult['cartId']; ?>" tabindex="-1" role="dialog" aria-labelledby="#editOrder<?php echo $productCategoryResult['cartId']; ?>" aria-hiden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h3 class="modal-title text-center" id="edit_vehacle">Modify Order Quantity</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" class="text-white">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../controller/editOrderAction.php" method="POST">                  
                                                            <!-- productQuantity input -->
                                                            <div class="form-group">
                                                                <label for="productQuantity">Modify Order Quantity</label>
                                                                <input type="number"  class="form-control" value="<?php echo $productCategoryResult['cartId']; ?>" name="cartId" placeholder="" hidden required>
                                                                <input type="number" name="currentQuantity" value="<?php echo $productCategoryResult['productQuantity']; ?>" class="form-control" hidden placeholder="produc" required>
                                                                <input type="number"  class="form-control" value="<?php echo $productCategoryResult['productQuantity']; ?>" name="newQuantity" placeholder="Enter New Quantity" required>
                                                                <input type="number" name="productPrice" value="<?php echo $productCategoryResult['productPrice']; ?>" class="form-control" hidden plachidden eholder="product" required>
                                                            </div>                          
                                                            <!-- Submit button -->
                                                            <button type="submit" name="editOrder" class="btn btn-primary btn-block mb-4"> Change </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            <?php endwhile; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php require_once('../../include/footer.php'); ?>