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
                    <a href="" data-toggle="modal" data-target="#newStaff" class="btn btn-primary text-white float-right">New Staff <i class="fa fa-plus"></i></a>
            <?php endif; ?>
            <h6 class="m-0 font-weight-bold text-primary">List of staff in the supermarket</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Gander</th>
                            <th>Username</th>
                            <th>Passporte</th>
                            <th>Role</th>
                            <th>Date Added</th>
                            <th>Date Modified</th>
                            <?php if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                                <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $getUserRecord = $conn->query("SELECT * FROM user, userrole WHERE user.position = userrole.roleId ");
                            if(mysqli_num_rows($getUserRecord) > 0):
                                while($userResult = mysqli_fetch_array($getUserRecord)): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $userResult['fullName']; ?></td>
                                        <td><?php echo $userResult['gender']; ?></td>
                                        <td><?php echo $userResult['username']; ?></td>
                                        <td><?php echo $userResult['passportSize']; ?></td>
                                        <td><?php echo $userResult['roleName']; ?></td>
                                        <td><?php echo $userResult['dateAdded']; ?></td>
                                        <td><?php echo $userResult['dateModified']; ?></td>
                                        <td>
                                            <?php if($_SESSION['userData']['roleName'] == 'administrator'): ?>
                                                <small><i class="fa fa-eye text-primary"></i></small>
                                                <small><i class="fa fa-edit text-primary"></i></small>
                                                <small><i class="fa fa-trash text-danger"></i></small>
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
<?php require_once('../modal/newStaff.php'); ?>
<?php require_once('../../include/footer.php'); ?>