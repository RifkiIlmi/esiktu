<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Riwayat Cuti</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat Cuti</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
    <div class="card">
				<div class="card-header">
					<h3 class="card-title">Daftar Riwayat Cuti</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Mulai Cuti</th>
                                <th>Akhir Cuti</th>
                                <th>Jumlah Hari</th>
                                <th>Jenis Cuti</th>
                                <th>File (Scan)</th>
							</tr>
						</thead>
						<tbody>

							<?php  $no=0; foreach ($cuti as  $value) : $no++; ?>
							<tr>

                                <td><?= $no?></td>
                                    <td><?= $value->nama?></td>
                                    <td><?= $value->NIP?></td>
                                    <td><?= formaldate_indo($value->mulai_cuti) ?></td>
                                    <td><?= formaldate_indo($value->akhir_cuti) ?></td>
                                    <td><?= count_days($value->mulai_cuti,$value->akhir_cuti) ?></td>
                                    <td><?= $value->jenis_cuti?></td>
                                    <td class="text-center"><button class="btn btn-md btn-primary ml-0 m-2" data-toggle="modal" data-target="#cuti<?= $value->id_cuti?>"> <i class="fas fa-eye"></i></button></td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
			</div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php foreach ($cuti as  $value) : ?>
<div class="modal fade" id="cuti<?= $value->id_cuti?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Foto Hasil Scan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-auto">
				<image class="img-fluid" src="<?php echo base_url('/public/surat_cuti/'); echo $value->file ?>"></image>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
		<!-- /.modal-content -->
	</div>	
</div>
<?php endforeach ?>
