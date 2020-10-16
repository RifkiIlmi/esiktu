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
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Data Lengkap Pegawai Negri Sipil</h3>
					</div>
					<div class="card-body">
						<!-- <form action=<?= base_url('DataPegawai\input_pegawai');?> method="POST" role="form"> -->
						<?php foreach ($selengkapnya_pns as  $value) :  ?>
						<div class="row">
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" value="<?= $value->nama?>" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>NIP</label>
									<input type="text" name="NIP" value="<?= $value->NIP?>" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>No. KTP</label>
									<input type="text" name="No_KTP" value="<?= $value->No_KTP?>" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Profesi</label>
									<input type="text" name="profesi" value="<?= $value->profesi?>" class="form-control"
										placeholder="Enter ...">
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
									<input type="date" name="tgl_lahir" value="<?= $value->tgl_lahir?>"
										class="form-control">
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-4	">

								<div class="form-group">
									<label>NPWP (Nomor Pokok Wajib Pajak)</label>
									<input type="text" name="npwp" value="<?= $value->npwp?>" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">
									<label>TMT Pangkat</label>
									<input type="date" name="tmt_pangkat" value="<?= $value->tmt_pangkat?>"
										class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-4">

								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" name="jabatan" class="form-control" value="<?= $value->jabatan?>"
										placeholder="Enter ...">
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-3">
								<!-- select -->
								<div class="form-group">
									<label>Pangkat</label>
									<select class="custom-select" name="pangkat">
										<option value='<?=$value->id_pangkat?>'><?=$value->pangkat?></option>


									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Golongan</label>
									<select class="custom-select" name="golongan">
										<option value='<?=$value->id_golongan?>'><?=$value->golongan?></option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Ruang</label>
									<select class="custom-select" name="ruang">
										<option value='<?=$value->id_ruang?>'><?=$value->ruang?></option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">

								<div class="form-group">
									<label>No. Kerpeg</label>
									<input type="text" name="no_kerpeg" value='<?=$value->no_kerpeg?>'
										class="form-control" placeholder="Enter ...">
								</div>
							</div>
						</div>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>

		</div>
		<div class="col-md-12">
			<div class="card card-secondary">
				<div class="card-header">
					<h3 class="card-title">Input Pengalaman dan SK</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>No. Sk Pangkat </label>
								<input type="text" name="no_sk_pangkat" value="<?= $value->no_sk_pangkat?>"
									class="form-control" placeholder="Enter ...">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Tanggal SK Pangkat </label>
								<input type="date" name="tgl_sk_pangkat" value="<?=$value->tgl_sk_pangkat?>"
									class="form-control" placeholder="Enter ...">
							</div>
						</div>
						<?php endforeach ?>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="card">
								<div class="card card-primary card-outline">
									<div class="card-body">
										<div class="form-group">
                                            <label>Riwayat Pendidikan Formal</label><button onclick="remove()" class="btn btn-primary ml-2 float-right"><i class="fas fa-minus-circle"></i></button>
                                            <button onclick="add()" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i></button>
                                            <div id="new_chq"></div>
                                            
                                            <input type="text"   name="formal" class="form-control tambah">
                                            <input type="hidden" value="1" id="total_chq" class="form-control tambah">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card">
								<div class="card card-primary card-outline">
									<div class="card-body">
										<div class="form-group">
                                            <label>Pendidikan Perjenjangan Teknis/Tahun</label></label><button onclick="remove1()" class="btn btn-primary ml-2 float-right"><i class="fas fa-minus-circle"></i></button>
                                            <button onclick="add1()" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i></button>
                                            <div id="new_chq1"></div>
                                            
                                            <input type="text"   name="formal1" class="form-control tambah">
                                            <input type="hidden" value="1" id="total_chq1" class="form-control tambah">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card">
								<div class="card card-primary card-outline">
									<div class="card-body">
										<div class="form-group">
                                            <label>Pengalaman Kerja</label><button onclick="remove2()" class="btn btn-primary ml-2 float-right"><i class="fas fa-minus-circle"></i></button>
                                            <button onclick="add2()" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i></button>
                                            <div id="new_chq2"></div>
                                            <input type="text"   name="formal2" class="form-control tambah">
                                            <input type="hidden" value="1" id="total_chq2" class="form-control tambah">
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


				</div>
				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>



	</section>
	<!-- /.content -->
</div>
