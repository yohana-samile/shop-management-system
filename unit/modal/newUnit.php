<!-- new unit modal -->
<div class="modal fade" id="newUnit" tabindex="-1" role="dialog" aria-labelledby="#newUnit" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Register product unit eg kg</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../controller/registerUnitAction.php" method="POST">                  
                    <!-- category_name input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" name="unitName" placeholder="unit Name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="addedBy" value="<?php echo $_SESSION['userData']['userId']; ?>" class="form-control" hidden required>
                    </div>                            
                    <!-- Submit button -->
                    <button type="submit" name="register" class="btn btn-primary btn-block mb-4"> Add unit</button>
                </form>
            </div>
        </div>
    </div>
</div>