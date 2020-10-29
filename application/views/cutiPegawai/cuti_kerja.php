<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Pegawai Cuti</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home');?>">Home</a></li>
						<li class="breadcrumb-item active">Pegawai Cuti</li>
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
			<a href="<?= base_url('DataCuti/tambahCuti');?>" class="btn btn-app">
				<i class="fas fa-plus text-dark"></i>
				<p class="text-dark">Tambah</p>
			</a>

			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item"><a class="nav-link active" href="#pns" data-toggle="tab">Pegawai PNS</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="#honorer" data-toggle="tab">Pegawai Honorer</a>
						</li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<div class="active tab-pane" id="pns">
							<table id="cutipns" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Mulai Cuti</th>
										<th>Akhir Cuti</th>
										<th>Jumlah Hari</th>
										<th>Jenis Cuti</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

									<?php  $no=0; foreach ($cutiPns as  $value) : $no++; ?>
									<tr>

										<td><?= $no?></td>
										<td><?= $value->nama?></td>
										<td><?= $value->NIP?></td>
										<td><?= formaldate_indo($value->mulai_cuti) ?></td>
										<td><?= formaldate_indo($value->akhir_cuti) ?></td>
										<td><?= count_days($value->mulai_cuti,$value->akhir_cuti) ?></td>
										<td><?= $value->jenis_cuti?></td>
										<td>Detail,  edit, lihat file, delete</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="honorer">
						<table id="cutihnr" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Mulai Cuti</th>
										<th>Akhir Cuti</th>
										<th>Jumlah Hari</th>
										<th>Jenis Cuti</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

									<?php  $no=0; foreach ($cutiHonorer as  $value) : $no++; ?>
									<tr>

										<td><?= $no?></td>
										<td><?= $value->nama?></td>
										<td><?= $value->NIP?></td>
										<td><?= formaldate_indo($value->mulai_cuti) ?></td>
										<td><?= formaldate_indo($value->akhir_cuti) ?></td>
										<td><?= count_days($value->mulai_cuti,$value->akhir_cuti) ?></td>
										<td><?= $value->jenis_cuti?></td>
										<td>Detail,  edit, lihat file, delete</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>

					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
