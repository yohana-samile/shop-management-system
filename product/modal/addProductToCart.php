<!-- add product to cart -->
<div class="modal fade" id="addToCart<?php echo $productCategoryResult['productId']; ?>" tabindex="-1" role="dialog" aria-labelledby="#addToCart" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add <?php echo $productCategoryResult['productName']; ?> to cart</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../../product cart/controller/addProductToCart.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <label for="productQuantity">How much product you want?</label>
                        <input type="text"  class="form-control" value="<?php echo $productCategoryResult['productId']; ?>" name="productId" placeholder="" hidden required>
                        <input type="number"  class="form-control" name="currentQuantity" hidden value="<?php echo $productCategoryResult['productsInStock']; ?>" placeholder="product Quantity" required>
                        <input type="number"  class="form-control" name="productQuantity" placeholder="product Quantity" required>
                    </div>
                    <div class="form-group" hidden>
                        <label for="price">price</label>
                        <input type="number" name="productPrice" value="<?php echo $productCategoryResult['productPrice']; ?>" class="form-control" placeholder="product Quantity" required>
                    </div>                           
                    <!-- Submit button -->
                    <button type="submit" name="cart" class="btn btn-primary btn-block mb-4"> Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>