<!-- category modal -->
<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="#newProduct" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add product in the stock</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/registerProductAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" name="productName" placeholder="product Name" required>
                    </div>
                    <div class="form-group">
                        <select name="productCategory" class="form-control"  id="productCategory">
                            <option hidden>Choose Product Category</option>
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
                        <input type="number" name="productsInStock" class="form-control" placeholder="product Quantity" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="productPrice" class="form-control" placeholder="product Price" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="productRegisteredBy" value="<?php echo $_SESSION['userData']['userId']; ?>" class="form-control" hidden required>
                    </div>                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>