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


			<div class="card card-warning">
				<div class="card-header">
					<h3 class="card-title">Form Tambah Data</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form action=<?= base_url('DataPegawai\input_pegawai');?> method="POST" role="form">
						<div class="row">
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>NIP <sup class="text-red">*Masukkan ID untuk honorer</sup></label>
									<input type="number" name="NIP" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Profesi</label>
									<input type="text" name="profesi" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" name="tempat_lahir" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control">
								</div>
							</div>
							<div class="a">
								<div class="col-sm-12">
									<!-- radio -->
									<label>Status Kepegawaian</label>
									<div class="form-group">
										<div class="custom-control custom-radio">
											<div class="kepegawaian">
												<input class="ini custom-control-input" value="PNS" type="radio"
													id="PNS" name="kepegawaian">
												<label for="PNS" class="custom-control-label">PNS</label>
											</div>
										</div>
										<div class="custom-control custom-radio">
											<input class="ini custom-control-input" value="honorer" type="radio"
												id="honorer" name="kepegawaian">
											<label for="honorer" class="custom-control-label">Honorer</label>
										</div>
									</div>
								</div>
							</div>
						</div>
<hr>
				</div>
				<div class="itu" id="show" style="display:none">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-4">

								<div class="form-group">
									<label>NPWP (Nomor Pokok Wajib Pajak)</label>
									<input type="text" name="npwp" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>No. Kerpeg</label>
									<input type="text" name="no_kerpeg" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" name="jabatan_pns" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">
									<label>TMT Pangkat</label>
									<input type="date" name="tmt_pangkat" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">
									<label>No SK Pangkat</label>
									<input type="text" name="no_sk_pangkat" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">
									<label>Tanggal SK Pangkat</label>
									<input type="date" name="tgl_sk_pangkat" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-sm-4">
								<!-- select -->
								<div class="form-group">
									<label>Pangkat</label>
									<select class="custom-select" name="pangkat">
										<?php foreach($pangkat as $value): ?>
										<option value='<?=$value->id_pangkat?>'><?=$value->pangkat?></option>
										<?php endforeach?>

									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Golongan</label>
									<select class="custom-select" name="golongan">
										<?php foreach($golongan as $value): ?>
										<option value='<?=$value->id_golongan?>'><?=$value->golongan?></option>
										<?php endforeach?>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Ruang</label>
									<select class="custom-select" name="ruang">
										<?php foreach($ruang as $value): ?>
										<option value='<?=$value->id_ruang?>'><?=$value->ruang?></option>
										<?php endforeach?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Data</button>
					</div>

				</div>
				<div class="itu" id="show1" style="display:none">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-4">

								<div class="form-group">
									<label>Jenis Ketenagaan</label>
									<input type="text" name="jenis_ketenagaan" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">
								<!-- select -->
								<div class="form-group">
									<label>Pendidikan</label>
									<input type="text" name="pendidikan_terakhir" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>

							<div class="col-sm-4">
								<!-- select -->
								<div class="form-group">
									<label>PNS yang Mengangkat</label>
									<select class="custom-select" name="mengangkat">
										<?php foreach($pns as $value): ?>
										<option value='<?=$value->id_PNS?>'><?=$value->nama?> - (<?=$value->jabatan?>)
										</option>
										<?php endforeach?>

									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<!-- select -->
								<div class="form-group">
									<label>No SPK</label>
									<input type="text" name="no_skp" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- select -->
								<div class="form-group">
									<label>Tanggal SPK</label>
									<input type="date" name="tgl_skp" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>

						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan Data</button>
					</div>
					</form>
				</div>
			</div>


		</div>
	</div>

</div>
