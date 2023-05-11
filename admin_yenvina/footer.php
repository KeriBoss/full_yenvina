

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="./action/logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">CẢNH BÁO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn xóa mục này? <br>
                (Dữ liệu khi xóa sẽ không thể khôi phục!)
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-danger"></a>
            </div>
        </div>
    </div>
</div>


</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
</div>

<script type="text/javascript">
    function CheckForm(){
            r = confirm("Ban co muon xoa khong?");
            if(r == false) return false;
            else return true;                       
    }
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?= $url ?>/public/vendor/jquery/jquery.min.js"></script>
<script src="<?= $url ?>/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= $url ?>/public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= $url ?>/public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= $url ?>/public/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= $url ?>/public/js/demo/chart-area-demo.js"></script>
<script src="<?= $url ?>/public/js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?= $url ?>/public/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $url ?>/public/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= $url ?>/public/js/demo/datatables-demo.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    //https://developer.snapappointments.com/bootstrap-select
$('#mySelect').selectpicker();
</script>
</body>

</html>