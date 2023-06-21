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
                if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                    <a href="" data-toggle="modal" data-target="#newUnit" class="btn btn-primary text-white float-right">New Unit <i class="fa fa-plus"></i></a>
            <?php endif; ?>
            <h6 class="m-0 font-weight-bold text-primary">Product Units</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Unit Name</th>
                            <th>Date Added</th>
                            <th>Date Modified</th>
                            <th>Added_by</th>
                            <?php if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                                <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $getUnitRecord = $conn->query("SELECT * FROM productUnit, user WHERE productUnit.addedBy = user.userId ");
                            if(mysqli_num_rows($getUnitRecord) > 0):
                                while($unitResult = mysqli_fetch_array($getUnitRecord)): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $unitResult['unitName']; ?></td>
                                        <td><?php echo $unitResult['dateAdded']; ?></td>
                                        <td><?php echo $unitResult['dateModified']; ?></td>
                                        <td><i class="fa fa-toggle-on text-primary"></i></td>
                                        <td>
                                            <?php if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                                                <small><i class="fa fa-eye text-primary"></i></small>
                                                <small><a href="" data-toggle="modal" data-target="#editUnit<?php echo $unitResult['unitId']; ?>"><i class="fa fa-edit text-primary"></i></a></small>
                                                <small><a href="../controller/registerUnitAction.php?deleteUnit=<?php echo $unitResult['unitId']; ?>"><i class="fa fa-trash text-danger"></i></a></small>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php include('../modal/editUnit.php'); ?>
                        <?php   endwhile; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('../modal/newUnit.php'); ?>
<?php require_once('../../include/footer.php'); ?>