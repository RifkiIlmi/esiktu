<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Pegawai Cuti <?php echo $filter?></h1>
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

			<?php echo form_open_multipart('DataCuti/cuti_kerja/', 'role="form" class="form" id="filter" '); ?>

				<div class="row mx-auto pb-3">
					<div class="col-lg-2">
						<input type="date" name="filter" id="filter" class="form-control">
					</div>
					<div class="col-md-2">
					<button class="btn btn-primary" type="submit">Filter Tahun</button>
				</div>
			</div>
			</form>
			</form>

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
						<div class="card-header">
				<a href="<?php echo base_url('DataCuti/print_cuti_pns/').$filter?>"><button class="btn btn-md btn-success ml-0 m-2"><i class="fas fa-print"></i> Print Data cuti PNS to Excel</button></a>
				</div>
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
										<th>File (Scan)</th>
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
										<td class="text-center"><button class="btn btn-md btn-primary ml-0 m-2" data-toggle="modal" data-target="#modal-default<?= $value->id_cuti?>"> <i class="fas fa-eye"></i></button></td>
										<td>
									<a href="<?php echo base_url('DataCuti/edit_cuti/'); echo $value->id_cuti ?>"><button class="btn btn-md btn-success ml-0 m-2"><i class="far fa-edit"></i></button></a>
									<button class="btn btn-md btn-danger ml-0 m-2" data-toggle="modal" data-target="#modal-default1<?= $value->id_cuti?>"> <i class="far fa-trash-alt"></i></button>
									</td>
									</tr>
	
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="honorer">
						<div class="card-header">
				<a href="<?php echo base_url('DataCuti/print_cuti_honorer/').$filter?>"><button class="btn btn-md btn-success ml-0 m-2"><i class="fas fa-print"></i> Print Data Cuti Honorer to Excel</button></a>
				</div>
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
										<th>File (Scan)</th>
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
										<td class="text-center"><button class="btn btn-md btn-primary ml-0 m-2" data-toggle="modal" data-target="#modal-default<?= $value->id_cuti?>"> <i class="fas fa-eye"></i></button></td>
										<td>
									<a href="<?php echo base_url('DataCuti/edit_cuti_honorer/'); echo $value->id_cuti ?>"><button class="btn btn-md btn-success ml-0 m-2"><i class="far fa-edit"></i></button></a>
									<button class="btn btn-md btn-danger ml-0 m-2" data-toggle="modal" data-target="#modal-default2<?= $value->id_cuti?>"> <i class="far fa-trash-alt"></i></button>
									</td>
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

<?php foreach ($cutiPns as  $value) : ?>
<div class="modal fade" id="modal-default<?= $value->id_cuti?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Foto Hasil Scan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-auto">
				<image class="img-fluid" src="<?php echo base_url('/public/surat_cuti/'); echo $value->file ?>"></image>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>	
</div>
<?php endforeach ?>
<?php foreach ($cutiPns as  $value) : ?>
<div class="modal fade" id="modal-default1<?= $value->id_cuti?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus data Cuti??</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-auto">
				<p>Anda Yakin Ingin meghapus data Cuti?</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="delete_cuti/<?= $value->id_cuti?>"><button
						type="button" class="btn btn-primary">Yakin!</button></a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>	
</div>
<?php endforeach ?>

<?php foreach ($cutiHonorer as  $value) : ?>
<div class="modal fade" id="modal-default2<?= $value->id_cuti?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus data Cuti??</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-auto">
				<p>Anda Yakin Ingin meghapus data Cuti?</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<a href="delete_cuti/<?= $value->id_cuti?>"><button
						type="button" class="btn btn-primary">Yakin!</button></a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>	
</div>
<?php endforeach ?>
