
<!-- category modal -->
<div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="#newCategory" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Add Product Category</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/registerCategoryAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" name="categoryName" placeholder="category name" required>
                    </div>
                    <div class="form-group">
                        <?php
                            $getUserID = $conn->query("SELECT * FROM `user` where userId = {$_SESSION['userData']['userId']} ");
                            $result = mysqli_fetch_array($getUserID);
                        ?>
                        <input type="number" value="<?php echo $result['userId']; ?>" name="addedBy" class="form-control" placeholder="" hidden required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="dateCategoryAdded" hidden>
                    </div>
                    
                    <div class="form-group">
                        <input type="date" class="form-control" name="dateCategoryModified" hidden>
                    </div>
                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>