<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6"> 
					<h1 class="m-0 text-dark">Data Gaji Berkala PNS</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Data Gaji Berkala PNS</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<?php echo form_open_multipart('DataGaji/gaji_pns/', 'role="form" class="form" id="filter" '); ?>
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
					<h3>Data Gaji Berkala Tahun <?= $filter ?></h3>
				</div><!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content">
						<!-- user aktfi list -->
						<div class="active tab-pane" id="useraktif">
							<table id="dtgajipns" class="table table-bordered table-striped text-center" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>NIP</th>
										<th>No.SK</th>
										<th>Tanggal SK</th>
									</tr>
								</thead>
								<tbody>
                                <?php $no=0; foreach($pns as $item) : $no++ ?>
                                <?php
                                    $year = date('Y', strtotime($item->tgl_sk_pangkat));
                                    $selisih = $filter - $year;
                                    if($selisih%2 == 0 && $year != $filter)
                                : ?>
                                    <tr>
                                        <td><?= $no ?>.</td>
                                        <td><?= $item->nama ?></td>
                                        <td><?= $item->NIP ?></td>
                                        <td><?= $item->no_sk_pangkat ?></td>
                                        <td><?= formaldate_indo($item->tgl_sk_pangkat) ?></td>
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

		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
