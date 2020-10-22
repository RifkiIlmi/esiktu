<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">User Management</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home');?>">Home</a></li>
						<li class="breadcrumb-item active">User Management</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
		<?= $this->session->flashdata('message'); ?>
			<div class="card">
				<div class="card-header p-2">
					<ul class="nav nav-pills">
						<li class="nav-item"><a class="nav-link active" href="#useraktif" data-toggle="tab">User
								Aktif</a></li>
						<li class="nav-item"><a class="nav-link" href="#allpegawai" data-toggle="tab">Semua Pegawai</a>
						</li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<!-- user aktfi list -->
						<div class="active tab-pane" id="useraktif">
							<table id="users" class="table table-bordered table-striped text-center" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>No.KTP</th>
										<th>tempat_lahir</th>
										<th>tgl_lahir</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

									<?php $no=0; foreach ($users as  $value) : $no++?>
									<tr>
										<td><?= $no?></td>
										<td><?= $value->nama?></td>
										<td><?= $value->NIP?></td>
										<td><?= $value->No_KTP?></td>
										<td><?= $value->tempat_lahir?></td>
										<td><?= $value->tgl_lahir?></td>
										<td>
											<?php if( $value->status == 1):?>
												<a href="<?= base_url()?>UserManagement/nonaktifkan/<?= $value->NIP ?>"
													class="btn btn-sm btn-outline-warning text-dark mr-1"
													data-toggle="tooltip" title="Non Aktifkan">
													<i class="fas fa-user-lock"></i> Non Aktifkan</a>
											<?php else:?>
												<a href="<?= base_url()?>UserManagement/aktifkan/<?= $value->NIP ?>"
													class="btn btn-sm btn-outline-info text-dark mr-1"
													data-toggle="tooltip" title="Aktifkan">
													<i class="fas fa-user-check"></i> Aktifkan</a>
											<?php endif;?>
												<a href="<?= base_url()?>UserManagement/detail/<?= $value->NIP ?>"
												class="btn btn-sm btn-info mr-1" data-toggle="tooltip" title="Detail">
												<i class="fas fa-eye"></i></a>
											<a href="<?= base_url()?>UserManagement/delete/<?= $value->NIP ?>"
												class="btn btn-sm btn-danger mr-1" data-toggle="tooltip" title="Delete">
												<i class="fas fa-trash"></i></a>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>

						<!-- semua pegawai lists  -->
						<div class="tab-pane" id="allpegawai">
							<table id="usermanage" class="table table-bordered table-striped nowrap text-center"
								style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>No.KTP</th>
										<th>tempat_lahir</th>
										<th>tgl_lahir</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

									<?php $no=0; foreach ($pegawai as  $value) : $no++?>
									<tr>
										<td><?= $no?></td>
										<td><?= $value->nama?></td>
										<td><?= $value->NIP ?></td>
										<td><?= $value->No_KTP?></td>
										<td><?= $value->tempat_lahir?></td>
										<td><?= $value->tgl_lahir?></td>
										<td>
											<?php if( $value->akun === "aktif"):?>
											<?php else : ?>
											<a href="#" data-toggle="modal" data-target="#register<?= $value->NIP ?>"
												class="btn btn-sm btn-primary mr-1" data-toggle="tooltip"
												title=>
												<i class="fas fa-key"></i> Daftarkan User</a>
											<?php endif; ?>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.tab-pane -->

					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php foreach ($pegawai as  $value) :?>
<div class="modal fade" id="register<?= $value->NIP?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php
			echo form_open_multipart('UserManagement/register/'.$value->NIP, 'role="form" class="form" id="register" ');
			?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Pilih Akses Untuk <?= $value->NIP ?> ?</h5>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="icheck-primary">
						<input type="radio" name="hak_akses" value="admin" id="admin" checked>
						<label for="admin">Admin
						</label>
					</div>
					<div class="icheck-primary">
						<input type="radio" name="hak_akses" value="pegawai" id="pegawai">
						<label for="pegawai">Pegawai
						</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary" type="submit">Daftarkan!</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
