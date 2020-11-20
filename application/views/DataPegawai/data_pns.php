<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data PNS</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
		<?= $this->session->flashdata('message'); ?>
			<div class="card">
				<div class="card-header">
				<a href="<?php echo base_url('DataPegawai/print_pns');?>"><button class="btn btn-md btn-success ml-0 m-2"><i class="fas fa-print"></i> Print to Excel</button></a>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIP</th>
								<th>No.KTP</th>
								<th>NPWP</th>
								<th>Pangkat</th>
								<th>tempat_lahir</th>
								<th>tgl_lahir</th>
								<th>Jabatan</th>
								<th>Profesi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php  $no=0; foreach ($pns as  $value) : $no++; ?>
							<tr>

								<td><?= $no?></td>
								<td><?= $value->nama?></td>
								<td><?= $value->NIP?></td>
								<td><?= $value->No_KTP?></td>
								<td><?= $value->npwp?></td>
								<td><?= $value->pangkat?></td>
								<td><?= $value->tempat_lahir?></td>
								<td><?= formaldate_indo($value->tgl_lahir)?></td>
								<td><?= $value->jabatan?></td>
								<td><?= $value->profesi?></td>
								
								<td><a href="<?= base_url('DataPegawai/selengkapnya/'); echo $value->NIP ?>"><button class="btn btn-md btn-primary ml-0 m-2"><i class="fas fa-angle-double-right"></i></button></a>
									<a href="<?php echo base_url('DataPegawai/edit_lengkap_pns/'); echo $value->NIP ?>"><button class="btn btn-md btn-success ml-0 m-2"><i class="far fa-edit"></i></button></a>
									<button class="btn btn-md btn-danger ml-0 m-2" data-toggle="modal" data-target="#modal-default<?= $value->NIP?>"> <i class="far fa-trash-alt"></i></button>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->

		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php foreach ($pns as  $value) : ?>
<div class="modal fade" id="modal-default<?= $value->NIP?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Default Modal</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Apakah kamu Yakin?&hellip;</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

				<a href="delete_pns/<?= $value->NIP?>"><button
						type="button" class="btn btn-primary">Yakin!</button></a>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>	
</div>
<?php endforeach ?>
