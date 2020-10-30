<?php 
	$id = $this->session->userdata('pegawai_nip');
	$userdata = $this->M_pegawai->getPegawaiById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?= base_url();?>public/img/logoHead.png" type="image/x-icon">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url();?>public/assets/AdminLTE3/plugins/fontawesome-free/css/all.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url();?>public/assets/AdminLTE3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url();?>public/assets/AdminLTE3/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url();?>public/jquery-ui-1.12.1/jquery-ui.css">
	
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<title>
		<?= $judul ?>
	</title>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item">
				<?php if ($this->session->userdata('hak_akses') == 'admin') : ?>
					<a class="nav-link" href="<?= base_url('home')?>">
						<?= $userdata['nama'] ?>
					</a>
				<?php else:?>
					<a class="nav-link" href="<?= base_url('homeUser')?>">
						<?= $userdata['nama'] ?>
					</a>
				<?php endif; ?>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url();?>public/assets/AdminLTE3/dist/img/defaultavatar.png" alt="User Avatar"
									class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
									
										<?= $userdata['nama'] ?>
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm"><?= $userdata['NIP'] ?></p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> online</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						
						<a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item dropdown-footer">Logout</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->
