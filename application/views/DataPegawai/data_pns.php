<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
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
    <a href="tambah_data" class="btn btn-md btn-primary ml-0 p-md-2">Tambah Data</a>
	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">


			<div class="card">
				<div class="card-header">
					<h3 class="card-title">DataTable with default features</h3>
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
							
							<?php $no=0; foreach ($pns as  $value) : $no++?>
							<tr>
							<td><?= $no?></td>
							<td><?= $value->nama?></td>
							<td><?= $value->NIP?></td>
							<td><?= $value->No_KTP?></td>
							<td><?= $value->npwp?></td>
							<td><?= $value->pangkat?></td>
							<td><?= $value->tempat_lahir?></td>
							<td><?= $value->tgl_lahir?></td>
							<td><?= $value->jabatan?></td>
							<td><?= $value->profesi?></td>
							<td><a href="user_management/update/<?= $value->NIP ?>" class="btn btn-md btn-primary ml-0"> Lihat Selengkapnya..</a></td>
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
