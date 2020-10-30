<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Pensiun</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('home');?>">Home</a></li>
						<li class="breadcrumb-item active">Pensiun PNS</li>
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

			<?php echo form_open_multipart('DataPensiun/pns_pensiun/', 'role="form" class="form" id="filter" '); ?>
			<div class="row mx-auto">
				<div class="col-lg-2">
					<input type="date" name="filter" id="filter" class="form-control">
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" type="submit">Filter Tahun</button>
				</div>
			</div>
			</form>
			<hr>

			<div class="card">
				<div class="card-header p-2">
					<h3>Data Pegawai Yang pensiun Tahun <?= $filter ?></h3>
					<ul class="nav nav-pills">
						<li class="nav-item"><a class="nav-link active" href="#p_utama" data-toggle="tab">Pegawai
								Utama</a></li>
						<li class="nav-item"><a class="nav-link" href="#p_madya" data-toggle="tab">Pegawai Madya</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="#p_umum" data-toggle="tab">Pegawai Umum/Muda</a>
						</li>
					</ul>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<div class="active tab-pane" id="p_utama">
							<table id="putama" class="table table-bordered table-striped text-center"
								style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Jabatan</th>
										<th>Tanggal SK</th>
										<th>Umur</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=0; foreach($pnsUtama as $item) : $no++ ?>
									<?php
									$bday = new DateTime($item->tgl_lahir);
									$diff = $yearNow->diff($bday);
                                    $year = date('Y', strtotime($item->tgl_sk_pangkat));
									$selisih = $filter - $year;
									?>
									<?php if($diff->y == 65):?>
									<tr>
										<td><?= $no ?>.</td>
										<td><?= $item->nama ?></td>
										<td><?= $item->NIP ?></td>
										<td><?= $item->jabatan?></td>
										<td><?= formaldate_indo($item->tgl_sk_pangkat) ?></td>
										<td><?= $diff->y ?> Tahun</td>
									</tr>
									<?php endif;?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<div class="tab-pane" id="p_madya">
							<table id="pmadya" class="table table-bordered table-striped text-center"
								style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Jabatan</th>
										<th>Tanggal SK</th>
										<th>Umur</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=0; foreach($pnsMadya as $item) : $no++ ?>
									<?php
									$bday = new DateTime($item->tgl_lahir);
									$diff = $yearNow->diff($bday);
                                    $year = date('Y', strtotime($item->tgl_sk_pangkat));
									$selisih = $filter - $year;
									?>
									<?php if($diff->y == 60):?>
									<tr>
										<td><?= $no ?>.</td>
										<td><?= $item->nama ?></td>
										<td><?= $item->NIP ?></td>
										<td><?= $item->jabatan?></td>
										<td><?= formaldate_indo($item->tgl_sk_pangkat) ?></td>
										<td><?= $diff->y ?> Tahun</td>
									</tr>
									<?php endif;?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<div class="tab-pane" id="p_umum">
							<table id="pumum" class="table table-bordered table-striped text-center" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>Jabatan</th>
										<th>Tanggal SK</th>
										<th>Umur</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=0; foreach($pnsUmum as $item) : $no++ ?>
									<?php
									$bday = new DateTime($item->tgl_lahir);
									$diff = $yearNow->diff($bday);
                                    $year = date('Y', strtotime($item->tgl_sk_pangkat));
									$selisih = $filter - $year;
									?>
									<?php if($diff->y == 58):?>
									<tr>
										<td><?= $no ?>.</td>
										<td><?= $item->nama ?></td> 
										<td><?= $item->NIP ?></td>
										<td><?= $item->jabatan?></td>
										<td><?= formaldate_indo($item->tgl_sk_pangkat) ?></td>
										<td><?= $diff->y ?> Tahun</td>
									</tr>
									<?php endif;?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

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
