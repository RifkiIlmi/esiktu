<div class="container-fluid mt-4">
	<?php if($this->session->flashdata('flash') ):?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash');?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
	<?php endif;?>
	
	<div class="row">
		<div class="col-lg-6 mb-3">
			<!-- Button trigger modal -->
			<a href="<?= base_url()?>mahasiswa/tambah" class="btn btn-primary">
				Tambah Data Mahasiswa
			</a>

		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<form action="" method="post">
				<div class="input-group mb-2">
					<input type="text" class="form-control" placeholder="Cari...." aria-label="Cari..." aria-describedby="button-addon2"
					 name="keyword" id="keyword" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" id="cari">Cari</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<h2>Daftar Mahasiswa</h2>
			<?php if(empty($mahasiswa)):?>
				<div class="alert alert-danger">
					Mahasiswa Tidak Ditemukan
				</div>
			<?php endif;?>
			<?php foreach ($mahasiswa as $mhs):?>

			<ul class="list-group">
				<li class="list-group-item">
					<?= $mhs['nama']?>
					<a href="<?= base_url();?>mahasiswa/hapus/<?= $mhs['id']?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Yakin?')">hapus</a>
					<a href="<?= base_url();?>mahasiswa/ubah/<?= $mhs['id']?>" class="badge badge-success float-right ml-1 tampilModalUbah"?>Update</a>
					<a href="<?= base_url();?>mahasiswa/detail/<?= $mhs['id']?>" class="badge badge-primary float-right ">detail</a>
				</li>

				<?php endforeach?>
			</ul>

		</div>
	</div>
</div>