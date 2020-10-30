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
			<form action=<?= base_url('DataPegawai\input_lengkap_honorer');?> method="POST" role="form">
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
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="id" value="<?= $value->id_PNS?>">
											<input type="hidden" name="id_honorer" value="<?= $value->id_honorer?>">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>NIP</label>
											<input type="text" name="NIP" value="<?= $value->NIP?>" class="form-control"
												placeholder="Enter ...">

											<?php $id = $value->NIP?>
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>No. KTP</label>
											<input type="text" name="No_KTP" value="<?= $value->No_KTP?>"
												class="form-control" placeholder="Enter ...">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Profesi</label>
											<input type="text" name="profesi" value="<?= $value->profesi?>"
												class="form-control" placeholder="Enter ...">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Tempat Lahir</label>
											<input type="text" name="tempat_lahir" value="<?= $value->tempat_lahir?>"
												class="form-control" placeholder="Enter ...">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input type="date" name="tanggal_lahir" value="<?= $value->tgl_lahir?>"
												class="form-control" placeholder="Enter ...">

										</div>
									</div>

									<div class="col-sm-4">
										<!-- text input -->
										<div class="form-group">
											<label>Jenis Ketenagaan</label>
											<input type="text" name="tempat_lahir"
												value="<?= $value->jenis_ketenagaan?>" class="form-control"
												placeholder="Enter ...">

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

					<div class="col-md-12">
						<div class="card card-secondary">
							<div class="card-header">
								<h3 class="card-title">Input data SK</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card card-primary card-outline">
												<div class="card-body">
													<div class="form-group">
														<label class="h3">Tambah data SK</label>

														<label>No SKP</label>
														<input  type="text" name="no_sk" class="form-control tambah"
															placeholder="No SK">
														<label>Tanggal SKP</label>
														<input type="date" name="tgl_sk" class="form-control tambah"
															placeholder="tgl SK">

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Data SKP yg di input</label>
											<?php foreach ($skp as  $value) :  ?>
											<div class="card">
												<div class="card card-primary card-outline">
													<label>No SKP</label>
													<input disabled type="text" name="no_sk" value="<?=$value->no_skp?>"
														class="form-control tambah" placeholder="No SK">
													<label>Tanggal SK</label>
													<input disabled type="date" name="tgl_sk"
														value="<?=$value->tgl_skp?>" class="form-control tambah"
														placeholder="tgl SK">
												</div>
											</div>
											<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>

						</div>
						<!-- /.card-body -->
					</div>
					<?php endforeach ?>
				</div>
				<!-- /.card -->
				<div class="modal-footer">
					<a href="<?php echo base_url('DataPegawai/honorer') ?>"><button type="button"
							class="btn btn-danger">Kembali</button></a>

					<button type="submit" class="btn btn-primary">Simpan Data</button>
				</div>
			</form>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->

</div>
