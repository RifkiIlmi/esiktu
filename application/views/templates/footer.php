<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.0.5
	</div>
	<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
	reserved.
	 <!-- Logout Modal-->
	 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                </div>
                <div class="modal-body">Apakah anda yakin Logut sekarang?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
	</div>
	
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>public/assets/AdminLTE3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url();?>public/assets/AdminLTE3/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


!-- page script -->
<script>
  $(function () {
    $("#usermanage").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
$(document).ready(function () {
    $(".ini").click(function () {
        $(".itu").hide();
        switch ($(this).val()) {
            case "PNS":
                $("#show").show("slow");
                break;
            case "honorer":
                $("#show1").show("slow");
                break;
        }
    });
});
</script>

</body>

</html>
