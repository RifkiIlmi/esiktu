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
	<div class="content">
		<div class="container-fluid">


			<div class="card card-warning">
				<div class="card-header">
					<h3 class="card-title">Form Tambah Data</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form role="form">
						<div class="row">
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="name" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>NIP</label>
									<input type="text" name="NIP" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>No. KTP</label>
									<input type="text" name="No_KTP" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Profesi</label>
									<input type="text" name="profesi" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" name="tempat_lahir" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">
								<!-- text input -->
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" class="form-control">
								</div>
							</div>
							<div class="a">
								<div class="col-sm-6">
									<!-- radio -->
									<label>Status Kepegawaian</label>
									<div class="form-group">
										<div class="custom-control custom-radio">
											<div class="kepegawaian">
												<input class="ini custom-control-input" value="PNS" type="radio" id="PNS"
													name="kepegawaian">
												<label for="PNS" class="custom-control-label">PNS</label>
											</div>
										</div>
										<div class="custom-control custom-radio">
											<input class="ini custom-control-input" value="honorer" type="radio" id="honorer"
												name="kepegawaian" checked>
											<label for="honorer" class="custom-control-label">Honorer</label>
										</div>

									</div>
								</div>
							</div>
						</div>

				</div>
				<div class="itu" id="show" style="display:none">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">

								<div class="form-group">
									<label>Nama</label>
									<input type="text" name="name" class="form-control" placeholder="Enter ...">
								</div>
							</div>
							<div class="col-sm-6">

								<div class="form-group">
									<label>NIP</label>
									<input type="text" name="NIP" class="form-control" placeholder="Enter ...">
								</div>
							</div>

						</div>
					</div>
                </div>
                <div class="itu" id="show1" style="display:none">
					<div class="card-body">

						<div class="row">
							<div class="col-sm-6">

								<div class="form-group">
									<label>Namdwdwa</label>
									<input type="text" name="name" class="form-control" >
								</div>
							</div>
							<div class="col-sm-6">

								<div class="form-group">
									<label>NIP</label>
									<input type="text" name="NIP" class="form-control" >
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
