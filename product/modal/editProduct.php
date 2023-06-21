<!-- editProduct modal -->
<div class="modal fade" id="editProduct<?php echo $productCategoryResult['productId']; ?>" tabindex="-1" role="dialog" aria-labelledby="#editProduct" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add product in the stock</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/editProductAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" value="<?php echo $productCategoryResult['productId']; ?>" name="productId" placeholder="" hidden required>
                        <input type="text"  class="form-control" value="<?php echo $productCategoryResult['productName']; ?>" name="productName" placeholder="product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Product Category</label>
                        <select name="productCategory" class="form-control"  id="productCategory">
                            <?php
                                $categoryRecord = $conn->query("SELECT * FROM `productcategory` ");
                                while($category = mysqli_fetch_array($categoryRecord)): ?>
                                    <option value="<?php echo $category['categoryId']; ?>"><?php echo $category['categoryName']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <!-- product unit -->
                    <div class="form-group">
                        <select name="productUnit" class="form-control"  id="productUnit">
                            <option hidden>Choose Unit</option>
                            <?php
                                $unitRecord = $conn->query("SELECT * FROM `productUnit` ");
                                while($unit = mysqli_fetch_array($unitRecord)): ?>
                                    <option value="<?php echo $unit['unitId']; ?>"><?php echo $unit['unitName']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="productsInStock" value="<?php echo $productCategoryResult['productsInStock']; ?>" class="form-control" placeholder="product Quantity" required>
                    </div> 
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="number" name="productPrice" value="<?php echo $productCategoryResult['productPrice']; ?>" class="form-control" placeholder="product Quantity" required>
                    </div>                           
                    <!-- Submit button -->
                    <button type="submit" name="editProduct" class="btn btn-primary btn-block mb-4"> Edit This Product</button>
                </form>
            </div>
        </div>
    </div>
</div>