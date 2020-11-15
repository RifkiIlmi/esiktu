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
										<th>Tempat Lahir</th>
										<th>Tanggal Lahir</th>
										<th>Hak Akses</th>
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
										<td><?= formaldate_indo($value->tgl_lahir) ?></td>
										<td><?= $value->hak_akses?></td>
										<td>
											<?php if( $value->status == 1):?>
											<a href="<?= base_url()?>UserManagement/nonaktifkan/<?= $value->NIP ?>"
												class="btn btn-sm btn-outline-warning text-dark mr-1"
												data-toggle="tooltip" title="Non Aktifkan">
												<i class="fas fa-user-lock"></i> Non Aktifkan</a>
											<?php else:?>
											<a href="<?= base_url()?>UserManagement/aktifkan/<?= $value->NIP ?>"
												class="btn btn-sm btn-outline-info text-dark mr-1" data-toggle="tooltip"
												title="Aktifkan">
												<i class="fas fa-user-check"></i> Aktifkan</a>
											<?php endif;?>
											<a href="#" data-toggle="modal" data-target="#edit<?= $value->NIP ?>"
												class="btn btn-sm btn-info mr-1" data-toggle="tooltip" title="Edit">
												<i class="fas fa-edit"></i></a>
											<a href="#" data-toggle="modal" data-target="#delete<?= $value->NIP ?>"
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
										<td><?= formaldate_indo($value->tgl_lahir)?></td>
										<td>
											<?php if( $value->akun === "aktif"):?>
											<?php else : ?>
											<a href="#" data-toggle="modal" data-target="#register<?= $value->NIP ?>"
												class="btn btn-sm btn-primary mr-1" data-toggle="tooltip" title=>
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

<!-- modal register akun -->
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
						<input type="radio" name="hak_akses" value="user" id="user">
						<label for="user">User
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

<!-- modal delete -->
<?php foreach ($pegawai as  $value) :?>
<div class="modal fade" id="delete<?= $value->NIP?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete data user <?= $value->NIP ?> ?</h5>
			</div>
			<div class="modal-body">
				<div class="mx-auto">
					<h4>Apakah Anda Yakin?</h4>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a href="<?= base_url('UserManagement/delete/'.$value->NIP)?>" class="btn btn-warning"
					type="submit">Yakin!</a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

<!-- modal edit -->
<?php foreach ($users as  $value) :?>
<div class="modal fade" id="edit<?= $value->NIP?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php
			echo form_open_multipart('UserManagement/edit/'.$value->NIP, 'role="form" class="form" id="edit" ');
			?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit data user <?= $value->NIP ?> ?</h5>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?= $value->username?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" value="<?= $value->password?>" name="password" class="form-control" placeholder="Masukkan Password Baru / (kosongkan)">
				</div>
				<div class="form-group">
					<label>Hak Akses</label>
					<select class="form-control" name="hak_akses">
					<option value="admin" <?php if($value->hak_akses=="admin") echo 'selected="selected"'; ?> >Admin</option>
					<option value="user" <?php if($value->hak_akses=="user") echo 'selected="selected"'; ?> >User</option>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary" type="submit">Edit!</button>
			</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
