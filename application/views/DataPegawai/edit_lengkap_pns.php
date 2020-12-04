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
	<form action=<?= base_url('DataPegawai\input_lengkap');?> method="POST" role="form">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Data Lengkap Pegawai Negri Sipil</h3>
					</div>
					<div class="card-body">

						<?php foreach ($selengkapnya_pns as  $value) :  ?>
						<div class="row">
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Nama</label>
									<input type="text"  name="nama" value="<?= $value->nama?>" class="form-control"
										placeholder="Enter ...">
										<input type="hidden" name="id" value="<?= $value->id_PNS?>"  >

								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>NIP</label>
									<input disabled type="text" name="NIP" value="<?= $value->NIP?>" class="form-control"
										placeholder="Enter ...">
                                        <input  type="hidden" name="NIP" value="<?= $value->NIP?>" class="form-control"
										placeholder="Enter ...">
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
							
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input  type="text" name="tempat_lahir" value="<?= $value->tempat_lahir?>"
										class="form-control" placeholder="Enter ...">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>TMT Pangkat</label>
									<input  type="date" name="tmt_pangkat" value="<?= $value->tmt_pangkat?>"
										class="form-control" placeholder="Enter ...">
								</div>
							</div>
							
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Profesi</label>
									<input  type="text" name="profesi" value="<?= $value->profesi?>" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>NPWP (Nomor Pokok Wajib Pajak)</label>
									<input  type="text" name="npwp" value="<?= $value->npwp?>" class="form-control"
										placeholder="Enter ...">
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="form-group">
									<label>Jabatan</label>
									<input  type="text" name="jabatan" class="form-control" value="<?= $value->jabatan?>"
										placeholder="Enter ...">
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-3">
								<!-- select -->
								<div class="form-group">
									<label>Pangkat</label>							
									<select name="pangkat" id="pangkat" class="form-control" required>
										<option value="1"<?php if($value->fk_id_pangkat=="1") echo 'selected="selected"'; ?> >Pembina Utama</option>
										<option value="2"<?php if($value->fk_id_pangkat=="2") echo 'selected="selected"'; ?> >Pembina Utama Madya</option>
										<option value="3"<?php if($value->fk_id_pangkat=="3") echo 'selected="selected"'; ?> >Pembina Utama Muda</option>
										<option value="4"<?php if($value->fk_id_pangkat=="4") echo 'selected="selected"'; ?> >Pembina Tingkat 1</option>
										<option value="5"<?php if($value->fk_id_pangkat=="5") echo 'selected="selected"'; ?> >Pembina</option>
										<option value="6"<?php if($value->fk_id_pangkat=="6") echo 'selected="selected"'; ?> >Penata Tingkat 1</option>
										<option value="7"<?php if($value->fk_id_pangkat=="7") echo 'selected="selected"'; ?> >Penata</option>
										<option value="8"<?php if($value->fk_id_pangkat=="8") echo 'selected="selected"'; ?> >Penata Muda Tingkat 1</option>
										<option value="9"<?php if($value->fk_id_pangkat=="9") echo 'selected="selected"'; ?> >Penata Muda</option>
										<option value="10"<?php if($value->fk_id_pangkat=="10") echo 'selected="selected"'; ?> >Pengatur Tingkat 1</option>
										<option value="11"<?php if($value->fk_id_pangkat=="11") echo 'selected="selected"'; ?> >Pengatur</option>
										<option value="12"<?php if($value->fk_id_pangkat=="12") echo 'selected="selected"'; ?> >Pengatur Muda Tingkat 1</option>
										<option value="13"<?php if($value->fk_id_pangkat=="13") echo 'selected="selected"'; ?> >Pengatur Muda</option>
										<option value="14"<?php if($value->fk_id_pangkat=="14") echo 'selected="selected"'; ?> >Juru Tingkat 1</option>
										<option value="15"<?php if($value->fk_id_pangkat=="15") echo 'selected="selected"'; ?> >Juru</option>
										<option value="16"<?php if($value->fk_id_pangkat=="16") echo 'selected="selected"'; ?> >Juru Muda Tingkat 1</option>
										<option value="17"<?php if($value->fk_id_pangkat=="17") echo 'selected="selected"'; ?> >Juru Muda</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Golongan</label>
									<select name="golongan" id="golongan" class="form-control" required>
										<option value="1"<?php if($value->fk_id_golongan=="1") echo 'selected="selected"'; ?> >I</option>
										<option value="2" <?php if($value->fk_id_golongan=="2") echo 'selected="selected"'; ?>>II</option>
										<option value="3" <?php if($value->fk_id_golongan=="3") echo 'selected="selected"'; ?>>III</option>
										<option value="4" <?php if($value->fk_id_golongan=="4") echo 'selected="selected"'; ?>>IV</option>	
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label>Ruang</label>
									<select name="ruang" id="ruang" class="form-control" required>
										<option value="1"<?php if($value->fk_id_golongan=="1") echo 'selected="selected"'; ?> >a</option>
										<option value="2" <?php if($value->fk_id_golongan=="2") echo 'selected="selected"'; ?>>b</option>
										<option value="3" <?php if($value->fk_id_golongan=="3") echo 'selected="selected"'; ?>>c</option>
										<option value="4" <?php if($value->fk_id_golongan=="4") echo 'selected="selected"'; ?>>d</option>
										<option value="5	" <?php if($value->fk_id_golongan=="5") echo 'selected="selected"'; ?>>e</option>	
									</select>
								</div>
							</div>
							<div class="col-sm-3">

								<div class="form-group">
									<label>No. Kerpeg</label>
									<input  type="text" name="no_kerpeg" value='<?=$value->no_kerpeg?>'
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
                                            <label>Riwayat Pendidikan Formal</label><a onclick="remove()" class="btn btn-primary ml-2 float-right"><i class="fas fa-minus-circle"></i></a>
                                            <a onclick="add()" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i></a>
                                            <div id="new_chq"></div>
                                            
                                            <input type="text"   name="a1" class="form-control tambah">
                                            <input type="hidden" value="1" id="total_chq" name="jumlah" class="form-control tambah">
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
                                            <label>Pendidikan Perjenjangan Teknis/Tahun</label><a onclick="remove1()" class="btn btn-primary ml-2 float-right"><i class="fas fa-minus-circle"></i></a>
                                            <a onclick="add1()" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i></a>
                                            <div id="new_chq1"></div>
                                            
                                            <input type="text"   name="b1" class="form-control tambah">
                                            <input type="hidden" value="1" id="total_chq1" name="jumlah1" class="form-control tambah">
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
                                            <label>Pengalaman Kerja</label><a onclick="remove2()" class="btn btn-primary ml-2 float-right"><i class="fas fa-minus-circle"></i></a>
                                            <a onclick="add2()" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i></a>
                                            <div id="new_chq2"></div>
                                            <input type="text"   name="c1" class="form-control tambah">
											<input type="hidden" value="1" id="total_chq2" name="jumlah2" class="form-control tambah">
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
			<a href="<?php echo base_url('DataPegawai/pns') ?>"><button type="button" class="btn btn-danger" >Kembali</button></a>
				<button type="submit" class="btn btn-primary">Simpan Data</button>
			</div>
		</div>

		</form>

	</section>
	<!-- /.content -->
</div>
