<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("components/main/_head"); ?>
<!-- ./head -->

<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<!-- navbar -->
			<?php $this->load->view("components/main/_navbar"); ?>
			<!-- ./navbar -->
			<!-- sidebar -->
			<?php $this->load->view("components/main/_sidebar"); ?>
			<!-- ./sidebar -->

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1><?= $title; ?></h1>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<a href="<?= base_url("user") ?>">
								<div class="card card-statistic-1">
									<div class="card-icon bg-primary">
										<i class="fas fa-users"></i>
									</div>
									<div class="card-wrap">
										<div class="card-header">
											<h4>Jumlah Admin</h4>
										</div>
										<div class="card-body">
											<?= $total_admins ?>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<a href="<?= base_url("supplier") ?>">
								<div class="card card-statistic-1">
									<div class="card-icon bg-danger">
										<i class="fas fa-truck-moving"></i>
									</div>
									<div class="card-wrap">
										<div class="card-header">
											<h4>Jumlah Supplier</h4>
										</div>
										<div class="card-body">
											<?= $total_suppliers ?>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<a href="<?= base_url("customer") ?>">
								<div class="card card-statistic-1">
									<div class="card-icon bg-warning">
										<i class="fas fa-users"></i>
									</div>
									<div class="card-wrap">
										<div class="card-header">
											<h4>Jumlah Customers</h4>
										</div>
										<div class="card-body">
											<?= $total_customers ?>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<a href="<?= base_url("item") ?>">
								<div class="card card-statistic-1">
									<div class="card-icon bg-success">
										<i class="fas fa-circle"></i>
									</div>
									<div class="card-wrap">
										<div class="card-header">
											<h4>Jumlah Barang</h4>
										</div>
										<div class="card-body">
											<?= $total_items ?>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</section>
				<section class="section">
					<div class="section-header">
						<h1>Grafik</h1>
					</div>
					<!-- <div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<a href="<?= base_url("user") ?>">
								<div class="card card-statistic-1">
									<div class="card-icon bg-primary">
										<i class="fas fa-users"></i>
									</div>
									<div class="card-wrap">
										<div class="card-header">
											<h4>Jumlah Admin</h4>
										</div>
										<div class="card-body">
											<?= $total_admins ?>
										</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12">
							<a href="<?= base_url("supplier") ?>">
								<div class="card card-statistic-1">
									<div class="card-icon bg-danger">
										<i class="fas fa-truck-moving"></i>
									</div>
									<div class="card-wrap">
										<div class="card-header">
											<h4>Jumlah Supplier</h4>
										</div>
										<div class="card-body">
											<?= $total_suppliers ?>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div> -->

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="card card-statistic-2">
								<div class="card-stats">
									<div class="card-stats-title">Jumlah Proyek

									</div>
									<div class="card-stats-items">
										<div class="card-stats-item">
											<div class="card-stats-item-count"><?= $total_proyekproses ?></div>
											<div class="card-stats-item-label">Proses</div>
										</div>
										<div class="card-stats-item">
											<div class="card-stats-item-count"><?= $total_proyekselesai ?></div>
											<div class="card-stats-item-label">Selesai</div>
										</div>
									</div>

								</div>
								<div class="card-icon shadow-primary bg-primary">
									<a href="<?= base_url("proyek") ?>">
										<i class="fas fa-archive"></i>
									</a>
								</div>
								<div class="card-wrap">
									<div class="card-header">

										<h4>Total Proyek</h4>

									</div>
									<div class="card-body">
										<?= $total_proyek ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="card card-statistic-2">
								<div class="card-chart">
									<canvas id="balance-chart" height="90"></canvas>
								</div>
								<div class="card-icon shadow-primary bg-primary">
									<i class="fas fa-dollar-sign"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Nilai Proyek</h4>
									</div>
									<div class="card-body">
										Rp. <?php echo $total_nilai ?>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-lg-4">
							<div class="card gradient-bottom">
								<div class="card-header">
									<h4>5 Barang Termahal</h4>

								</div>
								<div class="card-body" id="top-5-scroll">
									<?php foreach ($barang_terlaris as $bt) : ?>
										<ul class="list-unstyled list-unstyled-border">
											<li class="media">
												<!-- <img class="mr-3 rounded" width="55" src="../assets/img/products/product-3-50.png" alt="product"> -->
												<div class="media-body">
													<div class="float-right">
														<div class="font-weight-600 text-muted text-small"> Kode <?= $bt["kode_barang"] ?></div>
													</div>

													<div class="media-title">


														<?= $bt["nama_barang"] ?></div>
													<div class="mt-1">
														<div class="budget-price">
															<div class="budget-price-square bg-primary" data-width="20%"></div>
															<div class="budget-price-label">Rp. <?= $bt["harga_barang"] ?></div>
														</div>
														<div class="budget-price">
															<div class="budget-price-square bg-danger" data-width="10%"></div>
															<div class="budget-price-label">Stok Tersedia : <?= $bt["stok_barang"] ?></div>
														</div>
													</div>

												</div>
											</li>


										</ul>
									<?php endforeach; ?>
								</div>
								<div class="card-footer pt-3 d-flex justify-content-center">
									<div class="budget-price justify-content-center">
										<div class="budget-price-square bg-primary" data-width="20"></div>
										<div class="budget-price-label">Harga Barang</div>
									</div>
									<div class="budget-price justify-content-center">
										<div class="budget-price-square bg-danger" data-width="20"></div>
										<div class="budget-price-label">Jumlah Barang</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>





			<!-- footer -->
			<?php $this->load->view("components/main/_footer"); ?>
			<!-- ./footer -->
		</div>
	</div>

	<!-- scripts -->
	<?php $this->load->view("components/main/_scripts"); ?>
	<!-- ./scripts -->
</body>

</html>