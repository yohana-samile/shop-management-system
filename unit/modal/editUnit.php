<!-- new unit modal -->
<div class="modal fade" id="editUnit<?php echo $unitResult['unitId']; ?>" tabindex="-1" role="dialog" aria-labelledby="#editUnit<?php echo $userResult['unitId']; ?>" aria-hiden="true">
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
                    <!-- unit input -->
                    <div class="form-group">
                        <input type="text"  class="form-control" value="<?php echo $unitResult['unitId']; ?>" name="unitId" placeholder="unit" hidden required>
                        <input type="text"  class="form-control" value="<?php echo $unitResult['unitName']; ?>" name="unitName" placeholder="unit Name" required>
                    </div>                           
                    <!-- Submit button -->
                    <button type="submit" name="editUnit" class="btn btn-primary btn-block mb-4"> update unit</button>
                </form>
            </div>
        </div>
    </div>
</div>