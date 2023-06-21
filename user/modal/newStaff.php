
<!-- staff modal -->
<div class="modal fade" id="newStaff" tabindex="-1" role="dialog" aria-labelledby="#newStaff" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Staff Registration</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/registerUserAction.php" method="POST" enctype="multipart/form-data">                  
                    <div class="form-group">
                        <input type="text"  class="form-control" name="fullName" placeholder="Staff name" required>
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control" id="gender">
                            <option hidden>Choose Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text"  class="form-control" name="username" placeholder="Staff username" required>
                    </div>
                    <div class="form-group">
                        <img id="previewImage" class="img-account-profile. rounded-circle mb-2 mx-auto d-block" src="../../images/default.png" alt="" height="200px" width="200px" />
                        <!-- Profile picture help block -->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload form -->
                        <!-- <form id="teacherProfilePicture"> -->
                            <input class="form-control" type="file" id="profilePicture" name="passportSize" accept="image/*"  hidden  onchange="previewProfilePicture(event)"/>
                        <!-- Profile picture upload button -->										
                            <label class="btn btn-primary btn-sm mb-0" type="button" for="profilePicture" class="m-0"><i class="fas fa-upload fa-sm text-white-50 pe-2"></i> Upload passport image</label>
                        <!-- </form> -->
                    </div>
                    <div class="form-group">
                        <select name="position" class="form-control" id="position">
                            <option hidden>Choose Role</option>
                            <?php
                                $getUserRole = $conn->query("SELECT * FROM userrole ");
                                if(mysqli_num_rows($getUserRole) > 0):
                                    while($userRoleResult = mysqli_fetch_array($getUserRole)): ?>
                                    <option value="<?php echo $userRoleResult['roleId']; ?>"><?php echo $userRoleResult['roleName']; ?></option>
                            <?php endwhile; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text"  class="form-control" name="password" value="1234" placeholder="Staff password" hidden required>
                    </div>
                    
                    <div class="form-group">
                        <input type="date" class="form-control" name="dateAdded" hidden>
                        <input type="date" class="form-control" name="dateModified" hidden>
                    </div>
                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add Role</button>
                </form>
            </div>
        </div>
    </div>
</div>