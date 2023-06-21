<?php require_once('../../include/sidebar.php'); ?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php
                require_once('../../include/messages.php');
                if(isset($_GET['key'])){}
            ?>
            <h6 class="m-0 font-weight-bold text-primary">Role based on category</h6>
            <a href="" data-toggle="modal" data-target="#newCategory" class="btn btn-primary text-white float-right">New Role <i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Category Name</th>
                            <th>Date Added</th>
                            <th>Date Modified</th>
                            <th>Added By Admin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $getUserLogs = $conn->query("SELECT * FROM `userrole` ");
                            if(mysqli_num_rows($getUserLogs) > 0):
                                while($logResult = mysqli_fetch_array($getUserLogs)): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $logResult['roleName']; ?></td>
                                        <td><?php echo $logResult['dateAdded']; ?></td>
                                        <td><?php echo $logResult['dateModified']; ?></td>
                                        <td class="text-center"><i class="fa fa-toggle-on text-center text-primary"></i></td>
                                        <td>
                                            <i class="fa fa-eye text-primary"></i>
                                            <i class="fa fa-edit text-primary"></i>
                                            <i class="fa fa-trash text-danger"></i>
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