<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Tambah Pegawai Cuti</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Home</a></li>
						<li class="breadcrumb-item active">Tambah Cuti</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">

			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Form Tambah Data</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
				<?= $this->session->flashdata('message'); ?>

						<?php
						echo form_open_multipart('DataCuti/tambahCuti', 'role="form" class="form" id="save" ');
						?>
						<div class="row">
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Nama</label>
									<input type="text" id="nama_pegawai" name="nama" class="form-control" placeholder="Masukkan Nama ..." required>
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>NIP</label>
									<input type="text" name="NIP" class="form-control" >
								</div>
							</div>
							<div class="col-sm-4">
								<!-- text input -->
								<div class="form-group">
									<label>Jenis Cuti</label>
									<?= form_error('jenis_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
									<select name="jenis_cuti" id="jenis_cuti" class="form-control" required>
										<option selected disabled value="-">Pilih ...</option>
										<option value="Tahunan">Tahunan</option>
										<option value="Besar">Besar</option>
										<option value="Sakit">Sakit</option>
										<option value="Melahirkan">Melahirkan</option>
										<option value="Alasan Penting">Alasan Penting</option>
										<option value="Luar Tanggungan Negara">Luar Tanggungan Negara</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Mulai Tanggal</label>
									<?= form_error('awal_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
									<input type="date" id="awalCuti" name="mulai_cuti" class="form-control">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Sampai Dengan Tanggal</label>
									<?= form_error('akhir_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
									<input type="date" id="akhirCuti" name="akhir_cuti" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Alasan Cuti</label>
									<?= form_error('alasan_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
									<textarea class="form-control" name="alasan_cuti" id="alasan_cuti" cols="10" rows="2"></textarea>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Alamat Selama Cuti</label>
									<?= form_error('alamat_cuti', '<small class="text-danger pl-3">', '</small>'); ?>
									<textarea class="form-control" name="alamat_cuti" id="alamat_cuti" cols="10" rows="2"></textarea>
								</div>
							</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>

				</div>
			</div>


		</div>
	</div>

</div>
