<div class="container-fluid">

	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h2>Form Ubah Data Mahasiswa</h2>
				</div>
				<div class="card-body">
                    <?php //if(validation_errors()) : ?>
                    <!-- <div class="alert alert-danger" role="alert"> -->
                        <?php // echo validation_errors();?>
                    <!-- </div> -->
                    <?php //endif;?>
					<form action="" method="post">
						<div class="form-group">
							<input type="hidden" value="<?= $mahasiswa['id']?>" name="id" id="id">
							<label for="nama">Nama</label>
							<small class="form-text text-danger"><?= form_error('nama')?></small>
							<input type="text" value="<?= $mahasiswa['nama']?>" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama">
						</div>

						<div class="form-group">
							<label for="nim">NIM</label>
							<small class="form-text text-danger"><?= form_error('nim')?></small>
							<input type="number" value="<?= $mahasiswa['nim']?>" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM">
						</div>

						<div class="form-group">
							<label for="kelas">Kelas</label>
							<select class="form-control" name="kelas" id="kelas">
                                <?php foreach($kelas as $kls):?>

                                    <?php if($kls['nama'] == $mahasiswa['kelas']):?>
                                <option value="<?= $kls['nama']?>" selected><?= $kls['nama']?></option>

                                    <?php else :?>
                                    <option value="<?= $kls['nama']?>"><?= $kls['nama']?></option>

                                    <?php endif;?>
                                    
                                <?php endforeach;?>
							</select>
						</div>

						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<select class="form-control" name="jurusan" id="jurusan">
                                <?php foreach($jurusan as $jrs):?>

                                    <?php if($jrs['nama'] == $mahasiswa['jurusan']):?>
                                <option value="<?= $jrs['nama']?>" selected><?= $jrs['nama']?></option>

                                    <?php else :?>
                                <option value="<?= $jrs['nama']?>"><?= $jrs['nama']?></option>

                                    <?php endif;?>
                                <?php endforeach;?>
							</select>
						</div>

						<div class="form-group">
							<label for="umur">Umur</label>
							<small class="form-text text-danger"><?= form_error('umur')?></small>
							<input type="number" value="<?= $mahasiswa['umur']?>" maxlength="3" name="umur" class="form-control" id="umur" placeholder="Masukkan Umur">
                        </div>
                        
                        <button type="submit" class="btn btn-primary float-right" name="ubah">Update</button>


					</form>
				</div>
			</div>

		</div>
	</div>

</div>