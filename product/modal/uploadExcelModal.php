<!-- category modal -->
<div class="modal fade" id="uploadExcel" tabindex="-1" role="dialog" aria-labelledby="#uploadExcel" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title text-center" id="edit_vehacle">Upload excel of product</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="../controller/uploadExcelAction.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" class="form-control" name="file">
                    </div>
                    <input type="submit" name="submit_file" class="btn btn-primary text-white" value="Upload">
                </form>
            </div>
        </div>
    </div>
</div>