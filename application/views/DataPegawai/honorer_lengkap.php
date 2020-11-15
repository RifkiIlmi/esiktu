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
	<form action=<?= base_url('DataPegawai\input_lengkap_honorer');?> method="POST" role="form">
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Data Lengkap Pegawai Honorer</h3>
						</div>
						<div class="card-body">

							<?php foreach ($selengkapnya_honorer as  $value) :  ?>
							<div class="row">
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Nama</label>
										<input type="text" disabled name="nama" value="<?= $value->nama?>"
											class="form-control" placeholder="Enter ...">
										<input type="hidden" name="nama" value="<?= $value->nama?>" class="form-control"
											placeholder="Enter ...">
										<input type="hidden" name="id" value="<?= $value->id_PNS?>">
                                        <input type="hidden" name="id_honorer" value="<?= $value->id_honorer?>">

									</div>
								</div>
								<div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>NIP</label>
										<input disabled type="text" name="NIP" value="<?= $value->NIP?>"
											class="form-control" placeholder="Enter ...">
										<input type="hidden" name="NIP" value="<?= $value->NIP?>" class="form-control"
											placeholder="Enter ...">
										<?php $id = $value->NIP?>
                                        <?php $id_honorer = $value->id_honorer?>
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
										<input disabled type="text" name="tempat_lahir" value="<?= $value->tempat_lahir?>"
											class="form-control" placeholder="Enter ...">
										<input type="hidden" name="tempat_lahir" value="<?= $value->tempat_lahir?>"
											class="form-control" placeholder="Enter ...">
									</div>
								</div>
                                <div class="col-sm-6">
									<!-- text input -->
									<div class="form-group">
										<label>Tanggal Lahir</label>
										<input disabled type="date" name="tanggal_lahir" value="<?= $value->tgl_lahir?>"
											class="form-control" placeholder="Enter ...">
										<input type="hidden" name="tgl_lahir" value="<?= $value->tgl_lahir?>"
											class="form-control" placeholder="Enter ...">
									</div>
								</div>
								
								<div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>Jenis Ketenagaan</label>
										<input disabled type="text" name="jenis_ketenagaan"
											value="<?= $value->jenis_ketenagaan?>" class="form-control"
											placeholder="Enter ...">
										<input type="hidden" name="jenis_ketenagaan"
											value="<?= $value->jenis_ketenagaan?>" class="form-control"
											placeholder="Enter ...">
									</div>
								</div>
								<div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>Jabatan</label>
										<input disabled type="text" name="jabatan_honorer"
											value="<?= $value->jabatan_honorer?>" class="form-control">
										<input type="hidden" name="jabatan_honorer"
											value="<?= $value->jabatan_honorer?>" class="form-control">
									</div>
								</div>
                                <div class="col-sm-4">
									<!-- text input -->
									<div class="form-group">
										<label>PNS yang mengangkat</label>
                                        <?php foreach ($pns as  $value1) :?>
							            <?php if($value->fk_id_PNS == $value1->id_PNS) $nama_PNS=$value1->nama?>
							            <?php endforeach ?>
                                        <input disabled type="text" name="mengangkat"
											value="<?= $nama_PNS ?>" class="form-control">
                                            <input  type="hidden" name="mengangkat"
											value="<?= $nama_PNS ?>" class="form-control">
										
										
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
						<h3 class="card-title">Input data SK</h3>
					</div>
					<div class="card-body">
						<div class="row">

                        <div class="col-sm-12">
							<div class="form-group">
								<label>Data SKP yg di input</label>
								
                                <div class="card">
                                <div class="card card-primary card-outline">
								
									
								<div class="table">
								<table>
								<tr>
								<th>NO</th>
								<th>No. SKP</th>
								<th>Tanggal SK</th>
								</tr>
								
								<?php $no = 0; foreach ($skp as  $value) : $no++; ?>
								<tr>
								<td><?=$no;  ?></td>
								<td><?= $value->no_skp?></td>
								<td><?=$value->tgl_skp?></td>
								</tr>
								<?php endforeach ?>
								</table>
								</div>
                                
							</div>
						</div>
							

						</div>




					</div>

				</div>
				<!-- /.card-body -->
			</div>
            <?php endforeach ?>
			<!-- /.card -->
			<div class="modal-footer">
				<a href="<?php echo base_url('DataPegawai/honorer') ?>"><button type="button"
						class="btn btn-danger">Kembali</button></a>
				<a href="<?php echo base_url('DataPegawai/edit_lengkap_honorer/').$id_honorer.'/'.$id ?>"><button type="button"
						class="btn btn-success">Edit semua data</button></a>
				<button type="submit" class="btn btn-primary">Simpan Data</button>
			</div>
</div>

</form>

</section>
<!-- /.content -->
</div>
