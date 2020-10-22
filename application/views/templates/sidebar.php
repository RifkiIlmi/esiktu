<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= base_url();?>public/assets/AdminLTE3/index3.html" class="brand-link">
		<img src="<?= base_url();?>public/assets/AdminLTE3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url();?>public/assets/AdminLTE3/dist/img/user2-160x160.jpg"
					class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Alexander Pierce</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<?php if ($this->session->userdata('hak_akses') == 'admin') : ?>
				<li class="nav-item">
					<a href="<?= base_url('home');?>" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Pegawai
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
					<li class="nav-item">
							<a href="<?php echo base_url('DataPegawai/tambah_data') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Tambah Pegawai</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('DataPegawai/pns') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>PNS</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('DataPegawai/honorer') ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Honor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../tables/jsgrid.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Kenaikan Pangkat</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Gaji Pegawai
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('DataGaji/gaji_pns');?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Gaji Berkala PNS</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Pegawai Cuti
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('DataCuti/cuti_kerja');?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Cuti Kerja</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Pegawai Pensiun
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('DataPensiun/pns');?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pensiun PNS</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('UserManagement');?>" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>
							User Management
						</p>
					</a>
				</li>
				<?php endif; ?>

				<?php if ($this->session->userdata('hak_akses') == 'pegawai') : ?>
					<li class="nav-item">
					<a href="<?= base_url('HomeUser');?>" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Pegawai
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="../tables/simple.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>PNS</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../tables/data.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Honor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="../tables/jsgrid.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Kenaikan Pangkat</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Gaji Pegawai
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('DataGaji/gaji_pns');?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Gaji Berkala PNS</p>
							</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Pegawai Cuti
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('DataCuti/cuti_kerja');?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Cuti Kerja</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-table"></i>
						<p>
							Data Pegawai Pensiun
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('DataPensiun/pns');?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Pensiun PNS</p>
							</a>
						</li>
					</ul>
				</li>
				<?php endif; ?>


				<li class="nav-item">
					<a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Logout
						</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
