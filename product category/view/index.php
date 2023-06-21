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
                <h6 class="m-0 font-weight-bold text-primary">Product Categories</h6>
                <?php if($_SESSION['userData']['roleName'] == 'administrator' || $_SESSION['userData']['roleName'] == 'manager'): ?>
                    <a href="" data-toggle="modal" data-target="#newCategory" class="btn btn-primary text-white float-right">New Category <i class="fa fa-plus"></i></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Action Performed</th>
                                <th>addedBy By You</th>
                                <th>Date Time Added</th>
                                <th>Date Time Modified</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                $getProductCategoryRecord = $conn->query("SELECT * FROM `productcategory` ");
                                if(mysqli_num_rows($getProductCategoryRecord) > 0):
                                    while($productCategoryResult = mysqli_fetch_array($getProductCategoryRecord)): ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $productCategoryResult['categoryName']; ?></td>
                                            <td class="text-center"><i class="fa fa-toggle-on text-center text-primary"></i></td>
                                            <td><?php echo $productCategoryResult['dateCategoryAdded']; ?></td>
                                            <td><?php echo $productCategoryResult['dateCategoryModified']; ?></td>
                                            <td>
                                                <i class="fa fa-eye text-primary"></i>
                                                <?php if($_SESSION['userData']['roleName'] == 'administrator' || $_SESSION['userData']['roleName'] == 'manager'): ?>
                                                    <i class="fa fa-edit text-primary"></i>
                                                    <i class="fa fa-trash text-danger"></i>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                            <?php   endwhile; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once('../modal/category.php'); ?>
    <?php require_once('../../include/footer.php'); ?>