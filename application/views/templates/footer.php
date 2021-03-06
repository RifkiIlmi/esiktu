<?php 
	$id = $this->session->userdata('pegawai_nip');
	$userdata = $this->M_pegawai->getPegawaiById($id);
?>
<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>Version</b> 3.0.5
	</div>
	<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
	reserved.
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
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
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url();?>public/assets/AdminLTE3/plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/dist/js/demo.js"></script>
<script src="<?= base_url();?>public/assets/AdminLTE3/dist/js/pages/dashboard3.js"></script>
<script src="<?= base_url();?>public/jquery-ui-1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
	$(document).ready(function () {
		$('#nama_pegawai').autocomplete({
			source: "<?php echo site_url('DataCuti/get_autocomplete');?>",

			select: function (event, ui) {
			console.log(ui.item)
					$('[name="nama"]').val(ui.item.label);
					$('[name="NIP"]').val(ui.item.nip);
			},
			response: function(event, ui){
				if(ui.content.length === 0){
					console.log('No results loaded!');
				}else{
					console.log('success!');
				}
			},
		});

	});
</script>

<script>
	$(function () {
		$("#usermanage").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$("#putama").DataTable({
			"responsive": true,
			"autoWidth": false,
			dom: 'Bfrtip',
			buttons: [
        		{
            	extend: "excel",    // Extend the excel button
				className: 'btn btn-success',
				text: 'Print to Excel',
       			 },
  	  		],
		});
    
		$("#pmadya").DataTable({
			"responsive": true,
			"autoWidth": false,
			dom: 'Bfrtip',
			buttons: [
        		{
            	extend: "excel",    // Extend the excel button
				className: 'btn btn-success',
				text: 'Print to Excel',
       			 },
  	  		],
		});
    
		$("#pumum").DataTable({
			"responsive": true,
			"autoWidth": false,
			dom: 'Bfrtip',
			buttons: [
        		{
            	extend: "excel",    // Extend the excel button
				className: 'btn btn-success',
				text: 'Print to Excel',
       			 },
  	  		],
		});
    
		$("#cutipns").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$("#cutihnr").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$("#users").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$("#dtgajipns").DataTable({
			"responsive": true,
			"autoWidth": false,
			dom: "Bfrtip",
    		buttons: [
        		{
            	extend: "excel",    // Extend the excel button
				className: 'btn btn-success',
				text: 'Print to Excel',
       			 },
  	  		],
		});
    
		$("#kpangkat").DataTable({
			"responsive": true,
			"autoWidth": false,
			dom: 'Bfrtip',
			buttons: [
        		{
            	extend: "excel",    // Extend the excel button
				className: 'btn btn-success',
				text: 'Print to Excel',
       			 },
  	  		],
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
					document.getElementById("a").disabled = true;
					document.getElementById("b").disabled = true;
					document.getElementById("c").disabled = true;
					document.getElementById("d").disabled = true;
					document.getElementById("e").disabled = true;
					
					document.getElementById("1").disabled = false;
					document.getElementById("2").disabled = false;
					document.getElementById("3").disabled = false;
					document.getElementById("4").disabled = false;
					document.getElementById("5").disabled = false;
					document.getElementById("6").disabled = false;
					document.getElementById("7").disabled = false;
					document.getElementById("8").disabled = false;
					document.getElementById("9").disabled = false;
					break;
				case "honorer":
					$("#show1").show("slow");
					document.getElementById("1").disabled = true;
					document.getElementById("2").disabled = true;
					document.getElementById("3").disabled = true;
					document.getElementById("4").disabled = true;
					document.getElementById("5").disabled = true;
					document.getElementById("6").disabled = true;
					document.getElementById("7").disabled = true;
					document.getElementById("8").disabled = true;
					document.getElementById("9").disabled = true;

					document.getElementById("a").disabled = false;
					document.getElementById("a").disabled = false;
					document.getElementById("b").disabled = false;
					document.getElementById("c").disabled = false;
					document.getElementById("d").disabled = false;
					document.getElementById("e").disabled = false;
					break;
			}
		});
	});

</script>

<script>
	function add() {
		var new_chq_no = parseInt($('#total_chq').val()) + 1;
		var jumlah = new_chq_no;

		var new_input = "<input type='text' class='form-control mb-2' name='a" + new_chq_no + "' id='new_" + new_chq_no +
			"'>";
		$('#new_chq').append(new_input);
		$('#total_chq').val(new_chq_no)
	}

	function remove() {
		var last_chq_no = $('#total_chq').val();
		if (last_chq_no > 1) {
			$('#new_' + last_chq_no).remove();
			$('#total_chq').val(last_chq_no - 1);
		}
	}

</script>

<script>
	function add1() {
		var new_chq_no1 = parseInt($('#total_chq1').val()) + 1;
		var jumlah1 = new_chq_no1;
		document.cookie = 'jumlah1=' + jumlah1;

		var new_input1 = "<input type='text' class='form-control mb-2' name='b" + new_chq_no1 + "' id='new_1" + new_chq_no1 +
			"'>";
		$('#new_chq1').append(new_input1);
		$('#total_chq1').val(new_chq_no1)
	}

	function remove1() {
		var last_chq_no1 = $('#total_chq1').val();
		if (last_chq_no1 > 1) {
			$('#new_1' + last_chq_no1).remove();
			$('#total_chq1').val(last_chq_no1 - 1);
		}
	}

</script>

<script>
	function add2() {
		var new_chq_no2 = parseInt($('#total_chq2').val()) + 1;
		var jumlah2 = new_chq_no2;


		var new_input2 = "<input type='text' class='form-control mb-2'  name='c" + new_chq_no2 + "' id='new_2" +
			new_chq_no2 + "'>";
		$('#new_chq2').append(new_input2);
		$('#total_chq2').val(new_chq_no2)
	}

	function remove2() {
		var last_chq_no2 = $('#total_chq2').val();
		if (last_chq_no2 > 1) {
			$('#new_2' + last_chq_no2).remove();
			$('#total_chq2').val(last_chq_no2 - 1);
		}
	}

</script>

<script>
	function addsk() {
		var new_chq_nosk = parseInt($('#total_chqsk').val()) + 1;
		var jumlahsk = new_chq_nosk;


		var new_inputsk = "<input type='text' class='form-control mb-2'  name='c" + new_chq_nosk + "' id='new_sk" +
			new_chq_nosk + "'>";
		$('#new_chqsk').append(new_inputsk);
		$('#total_chqsk').val(new_chq_nosk)
	}

	function removesk() {
		var last_chq_nosk = $('#total_chqsk').val();
		if (last_chq_nosk > 1) {
			$('#new_sk' + last_chq_nosk).remove();
			$('#total_chqsk').val(last_chq_nosk - 1);

		}
	}

</script>


</body>

</html>
