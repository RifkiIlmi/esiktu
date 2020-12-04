<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Informasi Pribadi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Data</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<form action=<?= base_url('informasiPribadi\input_lengkap_honorer');?> method="POST" role="form">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Data Lengkap Pegawai Honorer</h3>
							</div>
							<div class="card-body">

								<?php foreach ($selengkapnya_honorer as  $value) :  ?>
								<div class="row">
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Nama</label>

											<input type="text" name="nama" value="<?= $value->nama?>"
												class="form-control">
											<input type="hidden" name="id" value="<?= $value->id_PNS?>">
											<input type="hidden" name="id_honorer" value="<?= $value->id_honorer?>">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>NIP</label>
											<input type="text" name="NIP" value="<?= $value->NIP?>"
												class="form-control">
											<?php $id = $value->NIP?>
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Tempat Lahir</label>
											<input type="text" name="tempat_lahir" value="<?= $value->tempat_lahir?>"
												class="form-control">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input type="date" name="tgl_lahir" value="<?= $value->tgl_lahir?>"
												class="form-control">

										</div>
									</div>
									
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Profesi</label>
											<input type="text" name="profesi" value="<?= $value->profesi?>"
												class="form-control">
										</div>
									</div>

									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Pendidikan Terakhir</label>
											<input type="text" name="pendidikan_terakhir"
												value="<?= $value->pendidikan_terakhir?>" class="form-control">
										</div>
									</div>


									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Jenis Ketenagaan</label>
											<input type="text" name="jenis_ketenagaan"
												value="<?= $value->jenis_ketenagaan?>" class="form-control">

										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Jabatan</label>
											<input type="text" name="jabatan_honorer"
												value="<?= $value->jabatan_honorer?>" class="form-control">

										</div>
									</div>
									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>PNS yang mengangkat</label>
											<?php foreach ($pns as  $value1) :?>
											<?php if($value->fk_id_PNS == $value1->id_PNS) $nama_PNS=$value1->nama?>
											<?php endforeach ?>
											<input disabled type="text" name="mengangkat" value="<?= $nama_PNS ?>"
												class="form-control">
											<input type="hidden" name="mengangkat" value="<?= $nama_PNS ?>"
												class="form-control">
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
					<?php endforeach ?>
				</div>
				<!-- /.card -->
				<div class="modal-footer">
					<a href="<?php echo base_url('informasiPribadi') ?>"><button type="button"
							class="btn btn-danger">Kembali</button></a>

					<button type="submit" class="btn btn-primary">Simpan Data</button>
				</div>
			</form>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->

</div>
