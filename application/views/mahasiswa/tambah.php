<div class="container-fluid">

	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h2>Form Tambah Mahasiswa</h2>
				</div>
				<div class="card-body">
                    <?php //if(validation_errors()) : ?>
                    <!-- <div class="alert alert-danger" role="alert"> -->
                        <?php // echo validation_errors();?>
                    <!-- </div> -->
                    <?php //endif;?>
					<form action="" method="post">
						<div class="form-group">
							<input type="hidden" name="id" id="id">
							<label for="nama">Nama</label>
							<small class="form-text text-danger"><?= form_error('nama')?></small>
							<input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama">
						</div>

						<div class="form-group">
							<label for="nim">NIM</label>
							<small class="form-text text-danger"><?= form_error('nim')?></small>
							<input type="number" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM">
						</div>

						<div class="form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control" name="kelas" id="kelas">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								<option value="K">K</option>
								<option value="N">N</option>
							</select>
						</div>

						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select class="form-control" name="jurusan" id="jurusan">
								<option value="Teknik Informatika">Teknik Informatika</option>
								<option value="Teknik Industri">Teknik Industri</option>
								<option value="Teknik Elektro">Teknik Elektro</option>
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Matematika">Matematika</option>
								<option value="Fiqh Wanita">Fiqh Wanita</option>
							</select>
						</div>

						<div class="form-group">
							<label for="umur">Umur</label>
							<small class="form-text text-danger"><?= form_error('umur')?></small>
							<input type="number" maxlength="3" name="umur" class="form-control" id="umur" placeholder="Masukkan Umur">
                        </div>
                        
                        <button type="submit" class="btn btn-primary float-right" name="tambah">Tambah</button>


					</form>
				</div>
			</div>

		</div>
	</div>

</div>