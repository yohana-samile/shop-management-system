<?php require_once('../include/sidebar.php'); ?>
<!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">This is your System Logs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Action Performed</th>
                                <th>Performed By You</th>
                                <th>Date Time Performed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sn = 1;
                                $getUserLogs = $conn->query("SELECT * FROM `systemlogs` WHERE performedBy = {$_SESSION['userData']['userId']} ");
                                if(mysqli_num_rows($getUserLogs) > 0):
                                    while($logResult = mysqli_fetch_array($getUserLogs)): ?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $logResult['actionPerformed']; ?></td>
                                            <td class="text-center"><i class="fa fa-toggle-on text-center text-primary"></i></td>
                                            <td><?php echo $logResult['dateTimePerformed']; ?></td>
                                        </tr>
                            <?php   endwhile; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- End of Main Content -->
<?php require_once('../include/footer.php'); ?>