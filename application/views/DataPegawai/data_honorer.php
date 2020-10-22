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
								<th>Jenis Ketenagaan</th>
                                <th>PNS yang Mengangkat</th>
							</tr>
						</thead>
						<tbody>

							
							<?php $nama_PNS=""; $no=0; foreach ($honorer as  $value) :$no++?>
							
							<?php foreach ($pns as  $value1) :?>
							<?php if($value->fk_id_PNS == $value1->id_PNS) $nama_PNS=$value1->nama?>
							<?php endforeach ?>
							<tr>
							<td><?= $no?></td>
							<td><?= $value->nama?></td>
							<td><?= $value->pegawai_NIP?></td>
							<td><?= $value->No_KTP?></td>
                            <td><?= $value->jenis_ketenagaan?></td>
							
                            <td><?= $nama_PNS?></td>
							
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
