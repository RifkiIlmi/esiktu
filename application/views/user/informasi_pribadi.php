<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Informasi Pribadi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Informasi Pribadi</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">

			<?php if($role == 'pns'):?>
			<form action=<?= base_url('DataPegawai\input_lengkap');?> method="POST" role="form">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Data Lengkap Pegawai Negri Sipil</h3>
							</div>
							<div class="card-body">

								<?php foreach ($pns as  $value) :  ?>
								<div class="row">
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Nama</label>
											<input type="text" disabled name="nama" value="<?= $value->nama?>"
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="nama" value="<?= $value->nama?>"
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="id" value="<?= $value->id_PNS?>">

										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>NIP</label>
											<input disabled type="text" name="NIP" value="<?= $value->NIP?>"
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="NIP" value="<?= $value->NIP?>"
												class="form-control" placeholder="Enter ...">
											<?php $id = $value->NIP?>
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>No. KTP</label>
											<input disabled type="text" name="No_KTP" value="<?= $value->No_KTP?>"
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="No_KTP" value="<?= $value->No_KTP?>"
												class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Profesi</label>
											<input disabled type="text" name="profesi" value="<?= $value->profesi?>"
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="profesi" value="<?= $value->profesi?>"
												class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Tempat Lahir</label>
											<input disabled type="text" name="tempat_lahir"
												value="<?= $value->tempat_lahir?>" class="form-control"
												placeholder="Enter ...">
											<input type="hidden" name="tempat_lahir" value="<?= $value->tempat_lahir?>"
												class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-6">
										<!-- text input -->
										<div class="form-group">
											<label>Tanggal Lahir</label>
											<input disabled type="date" name="tgl_lahir" value="<?= $value->tgl_lahir?>"
												class="form-control">
											<input type="hidden" name="tgl_lahir" value="<?= $value->tgl_lahir?>"
												class="form-control">
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-sm-4	">

										<div class="form-group">
											<label>NPWP (Nomor Pokok Wajib Pajak)</label>
											<input disabled type="text" name="npwp" value="<?= $value->npwp?>"
												class="form-control" placeholder="Enter ...">
											<input type="hidden" name="npwp" value="<?= $value->npwp?>"
												class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-4">

										<div class="form-group">
											<label>TMT Pangkat</label>
											<input disabled type="date" name="tmt_pangkat"
												value="<?= $value->tmt_pangkat?>" class="form-control"
												placeholder="Enter ...">
											<input type="hidden" name="tmt_pangkat" value="<?= $value->tmt_pangkat?>"
												class="form-control" placeholder="Enter ...">
										</div>
									</div>
									<div class="col-sm-4">

										<div class="form-group">
											<label>Jabatan</label>
											<input disabled type="text" name="jabatan" class="form-control"
												value="<?= $value->jabatan?>" placeholder="Enter ...">
											<input type="hidden" name="jabatan" class="form-control"
												value="<?= $value->jabatan?>" placeholder="Enter ...">
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-sm-3">
										<!-- select -->
										<div class="form-group">
											<label>Pangkat</label>
											<input disabled name="pangkat" class="form-control"
												value="<?= $value->pangkat?>" placeholder="Enter ...">
											<input type="hidden" name="pangkat" class="form-control"
												value="<?= $value->fk_id_pangkat?>" placeholder="Enter ...">

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Golongan</label>
											<input disabled name="golongan" class="form-control"
												value="<?= $value->golongan?>" placeholder="Enter ...">
											<input type="hidden" name="golongan" class="form-control"
												value="<?= $value->fk_id_golongan?>" placeholder="Enter ...">

										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>Ruang</label>
											<input disabled name="ruang" class="form-control"
												value="<?= $value->ruang?>" placeholder="Enter ...">
											<input type="hidden" name="ruang" class="form-control"
												value="<?= $value->fk_id_ruang?>" placeholder="Enter ...">

										</div>
									</div>
									<div class="col-sm-3">

										<div class="form-group">
											<label>No. Kerpeg</label>
											<input type="hidden" name="no_kerpeg" value='<?=$value->no_kerpeg?>'
												class="form-control" placeholder="Enter ...">
											<input disabled type="text" name="no_kerpeg" value='<?=$value->no_kerpeg?>'
												class="form-control" placeholder="Enter ...">
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
										<div class="form-group">
											<label>Data Pendidikan Formal</label>
											<?php foreach ($pf as  $value) :  ?>
											<input disabled type="text" name="123" value="<?= $value->pendidikan?>"
												class="form-control">
											<?php endforeach?>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label>Data Pendidikan Perjenjangan Teknis/Tahun</label>
											<?php foreach ($pjt as  $value) :  ?>
											<input disabled type="text" name="231" value="<?=$value->pelatihan?>"
												class="form-control">
											<?php endforeach?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>Data Pengalaman Kerja</label>
											<?php foreach ($pk as  $value) :  ?>
											<input disabled type="text" name="222" value="<?=$value->pengalaman_kerja?>"
												class="form-control">
											<?php endforeach ?>
										</div>
									</div>

								</div>

								<div class="row">
									<div class="col-sm-4">
										<div class="card">
											<div class="card card-primary card-outline">
												<div class="card-body">
													<div class="form-group">
														<label>Riwayat Pendidikan Formal</label><a onclick="remove()"
															class="btn btn-primary ml-2 float-right"><i
																class="fas fa-minus-circle"></i></a>
														<a onclick="add()" class="btn btn-primary float-right"><i
																class="fas fa-plus-circle"></i></a>
														<div id="new_chq"></div>

														<input type="text" name="a1" class="form-control tambah">
														<input type="hidden" value="1" id="total_chq" name="jumlah"
															class="form-control tambah">
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
														<label>Pendidikan Perjenjangan Teknis/Tahun</label><a
															onclick="remove1()"
															class="btn btn-primary ml-2 float-right"><i
																class="fas fa-minus-circle"></i></a>
														<a onclick="add1()" class="btn btn-primary float-right"><i
																class="fas fa-plus-circle"></i></a>
														<div id="new_chq1"></div>

														<input type="text" name="b1" class="form-control tambah">
														<input type="hidden" value="1" id="total_chq1" name="jumlah1"
															class="form-control tambah">
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
														<label>Pengalaman Kerja</label><a onclick="remove2()"
															class="btn btn-primary ml-2 float-right"><i
																class="fas fa-minus-circle"></i></a>
														<a onclick="add2()" class="btn btn-primary float-right"><i
																class="fas fa-plus-circle"></i></a>
														<div id="new_chq2"></div>
														<input type="text" name="c1" class="form-control tambah">
														<input type="hidden" value="1" id="total_chq2" name="jumlah2"
															class="form-control tambah">
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
						<div class="modal-footer">
							<a href="<?php echo base_url('DataPegawai/pns') ?>"><button type="button"
									class="btn btn-danger">Kembali</button></a>
							<a href="<?php echo base_url('DataPegawai/edit_lengkap_pns/').$id ?>"><button type="button"
									class="btn btn-success">Edit semua data</button></a>
							<button type="submit" class="btn btn-primary">Simpan Data</button>
						</div>
					</div>
				</div>
			</form>

			<?php else:?>
			<form action=<?= base_url('informasiPribadi\input_lengkap_honorer');?> method="POST" role="form">

				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Pribadi</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Nama</label>
									<input type="text" disabled name="nama" value="<?= $honorer[0]->nama ?>"
										class="form-control">
									<input type="hidden" name="nama" value="<?= $honorer[0]->nama ?>"
										class="form-control">
									<input type="hidden" name="id" value="<?= $honorer[0]->id_PNS ?>">
									<input type="hidden" name="id_honorer" value="<?= $honorer[0]->id_honorer ?>">

								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>NIP</label>
									<input disabled type="text" name="NIP" value="<?= $honorer[0]->NIP ?>"
										class="form-control">
									<input type="hidden" name="NIP" value="<?= $honorer[0]->NIP ?>"
										class="form-control">
									<?php $id = $honorer[0]->NIP ?>
									<?php $id_honorer = $honorer[0]->id_honorer?>
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input disabled type="text" name="tempat_lahir"
										value="<?= $honorer[0]->tempat_lahir ?>" class="form-control">
									<input type="hidden" name="tempat_lahir" value="<?= $honorer[0]->tempat_lahir ?>"
										class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input disabled type="date" name="tanggal_lahir"
										value="<?= $honorer[0]->tgl_lahir ?>" class="form-control">
									<input type="hidden" name="tgl_lahir" value="<?= $honorer[0]->tgl_lahir ?>"
										class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>No. KTP</label>
									<input disabled type="text" name="No_KTP" value="<?= $honorer[0]->No_KTP ?>"
										class="form-control">
									<input type="hidden" name="No_KTP" value="<?= $honorer[0]->No_KTP ?>"
										class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>Profesi</label>
									<input disabled type="text" name="profesi" value="<?= $honorer[0]->profesi ?>"
										class="form-control">
									<input type="hidden" name="profesi" value="<?= $honorer[0]->profesi ?>"
										class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>Pendidikan Terakhir</label>
									<input disabled type="text" name="pendidikan_terakhir"
										value="<?= $honorer[0]->pendidikan_terakhir ?>" class="form-control">
									<input type="hidden" name="pendidikan_terakhir"
										value="<?= $honorer[0]->pendidikan_terakhir ?>" class="form-control">
								</div>
							</div>

							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>Jenis Ketenagaan</label>
									<input disabled type="text" name="jenis_ketenagaan"
										value="<?= $honorer[0]->jenis_ketenagaan ?>" class="form-control">
									<input type="hidden" name="jenis_ketenagaan"
										value="<?= $honorer[0]->jenis_ketenagaan ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>Jabatan</label>
									<input disabled type="text" name="jabatan_honorer"
										value="<?= $honorer[0]->jabatan_honorer ?>" class="form-control">
									<input type="hidden" name="jabatan_honorer"
										value="<?= $honorer[0]->jabatan_honorer ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>PNS yang mengangkat</label>
									<?php foreach ($data_pns as  $value) :?>
									<?php if($honorer[0]->fk_id_PNS == $value->id_PNS) $nama_PNS=$value->nama?>
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
				<div class="modal-footer">
					<a href="<?php echo base_url('informasiPribadi/edit_lengkap_honorer/').$id_honorer.'/'.$id ?>"><button
							type="button" class="btn btn-success">Edit semua data</button></a>
					<button type="submit" class="btn btn-primary">Simpan Data</button>
				</div>
			</form>
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Data SPK</h3>
				</div>
				<div class="card-body">
					<?php foreach ($spk as  $pns[0]) :  ?>
					<p><?= $pns[0]->no_skp?> / <?= formaldate_indo($pns[0]->tgl_skp)?></p>
					<?php endforeach ?>
				</div>
			</div>

			<?php endif;?>

			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Informasi Lainnya ...</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">

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
