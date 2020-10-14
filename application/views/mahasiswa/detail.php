<div class="container-fluid mt-5">

<div class="row">
    <div class="col-md-4">
    
    <div class="card">
        <div class="card-header">
            <h1>Detail Mahasiswa</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $mahasiswa['nama']?></h5>
            <p class="card-text">NIM : <?= $mahasiswa['nim']?></p>
            <p class="card-text">Kelas : <?= $mahasiswa['kelas']?></p>
            <p class="card-text">Jurusan : <?= $mahasiswa['jurusan']?></p>
            <p class="card-text">Umur : <?= $mahasiswa['umur']?></p>
        </div>
    </div>
    <a href="<?= base_url();?>mahasiswa" class="btn btn-primary mt-4 float-right">Kembali</a>
    
    </div>
</div>

</div>