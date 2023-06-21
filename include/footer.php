
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Shop Management System &copy; <?php echo date('Y'); ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            // img uploading
            function previewProfilePicture(event) {
                var input = event.target;
                    if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                    $("#previewImage").attr("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
                }
            }        

            // print receipt
            function printAppoitment(){
                var printapp = window.open('', '_blank', 'height=700 width=800');
                printapp.document.write(document.getElementById("printAppoitment").innerHTML);
                printapp.print();
                printapp.close();
            }
            // hide alert
            $(document).ready(function() {

                $(".alert").hide();

                $(".alert").fadeTo(5000, 1000).slideUp(1000, function() {
                    $(".alert").slideUp(1000);
                });
            });
        </script>
   
        <!-- Bootstrap core JavaScript-->
        <script src="../../asset/vendor/jquery/jquery.min.js"></script>

        <script src="../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../asset/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../../asset/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../../asset/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../../asset/js/demo/datatables-demo.js"></script>
    </body>
</html>