<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?=base_url();?>">Inventory App</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?=base_url();?>">IA</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li class="<?=($this->uri->segment(1) == 'dashboard') ? 'active' : ''?>">
				<a class="nav-link" href="<?=base_url('dashboard');?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
			</li>

<?php if ($this->session->userdata('user_role') !== 'manager'): ?>
			<li class="<?=($this->uri->segment(1) == 'grafik') ? 'active' : ''?>">
				<a class="nav-link" href="<?=base_url('grafik');?>"><i class="fas fa-fire"></i> <span>Grafik</span></a>
			</li>
<?php endif;?>

			<?php if ($this->session->userdata('user_role') == 'manager'): ?>
			<li class="menu-header">Menu</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-asterisk"></i> <span>Menu Utama</span></a>
				<ul class="dropdown-menu">
						<li><a class="nav-link" href="<?=base_url("Manager/laporan")?>">Acc Laporan</a></li>


				</ul>
			</li>
			<?php endif;?>
			<?php if ($this->session->userdata('user_role') !== "manager"): ?>
			<li class="menu-header">Master Data</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-asterisk"></i> <span>Data Utama</span></a>
				<ul class="dropdown-menu">
					<?php if ($this->session->userdata("user_role") == "admin"): ?>
						<li><a class="nav-link" href="<?=base_url("proyek")?>">Kelola Proyek</a></li>
					<?php endif;?>

					<li class="<?=($this->uri->segment(1) == 'supplier') ? 'active' : ''?>"><a class="nav-link" href="<?=base_url("supplier")?>"><span>Kelola Supplier</span></a></li>

					<?php if ($this->session->userdata("user_role") == "admin"): ?>
						<li class="<?=($this->uri->segment(1) == 'customer') ? 'active' : ''?>"><a class="nav-link" href="<?=base_url("customer")?>"> <span>Kelola Customer</span></a></li>
					<?php endif;?>
				</ul>
			</li>

			<?php if ($this->session->userdata("user_role") == "admin"): ?>
				<li class="dropdown">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box-open"></i> <span>Data Barang</span></a>
					<ul class="dropdown-menu">

						<li class="<?=($this->uri->segment(1) == 'item') ? 'active' : ''?>"><a class="nav-link" href="<?=base_url("item")?>">Kelola Barang</a></li>
						<li class="<?=($this->uri->segment(1) == 'category') ? 'active' : ''?>"><a class="nav-link" href="<?=base_url("category")?>">Kelola Kategori</a></li>
						<li class="<?=($this->uri->segment(1) == 'unit') ? 'active' : ''?>"><a class="nav-link" href="<?=base_url("unit")?>">Kelola Satuan</a></li>

					</ul>
				</li>
			<?php endif;?>


			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data Transaksi</span></a>
				<ul class="dropdown-menu">
					<!-- <li><a class="nav-link" href="<?=base_url("permintaan")?>">Permintaan Pembelian</a></li> -->
					<li><a class="nav-link" href="<?=base_url("incomingitem")?>">Barang Masuk</a></li>
					<?php if ($this->session->userdata("user_role") == "admin"): ?>
						<li><a class="nav-link" href="<?=base_url("outcomingitem")?>">Barang Keluar</a></li>
					<?php endif;?>
				</ul>
			</li>

			<li class="menu-header">Laporan</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan</span></a>
				<ul class="dropdown-menu">

					<!-- <li><a class="nav-link" href="<?=base_url("report/reporttransactions")?>"><i class="fas fa-file"></i> <span>Rekap Transaksi</span></a></li> -->
					<li><a class="nav-link" href="<?=base_url("report/reportsuppliers")?>"><i class="fas fa-file"></i> <span>Rekap Supplier</span></a></li>
					<li><a class="nav-link" href="<?=base_url("report/reportcustomers")?>"><i class="fas fa-file"></i> <span>Pelanggan</span></a></li>
					<li><a class="nav-link" href="<?=base_url("report/barangKeluar")?>"><i class="fas fa-file"></i> <span> Barang Keluar</span></a></li>
					<li><a class="nav-link" href="<?=base_url("report/barangMasuk")?>"><i class="fas fa-file"></i> <span> Barang Masuk</span></a></li>
				</ul>
			</li>
			<?php if ($this->session->userdata("user_role") == "admin"): ?>
				<li class="dropdown">
					<a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Informasi Notifikasi</span></a>
					<ul class="dropdown-menu">

						<li><a class="nav-link" href="<?=base_url("informasi")?>">Kelola Informasi</a></li>

					</ul>
				</li>
			<?php endif;?>
			<?php endif;?>
			<?php if ($this->session->userdata("user_role") == "admin"): ?>
				<li class="menu-header">Pengguna</li>
				<li><a class="nav-link" href="<?=base_url("user")?>"><i class="fas fa-users"></i> <span>Kelola Users</span></a></li>
			<?php endif;?>

			<!-- <li><a class="nav-link" href="<?=base_url("profile")?>"><i class="fas fa-user-circle"></i> <span>Profil Saya</span></a></li> -->
		</ul>

		<li class="menu-header"></li>

	</aside>
</div>
