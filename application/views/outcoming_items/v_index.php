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
					<div class="section-header d-flex justify-content-between">
						<h1><?= $title; ?></h1>
						<a href="<?= base_url("outcomingitem/create") ?>" class="btn btn-primary btn-lg">Tambah Barang Keluar</a>
					</div>
					<!-- alert flashdata -->
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<!-- end alert flashdata -->
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped" id="table-1">
											<thead>
												<tr>
													<th class="text-center">
														No
													</th>
													<th>Tanggal</th>
													<th>Kode Transaksi</th>
													<th>Kode Barang</th>
													<th>Nama Barang</th>
													<th>Jumlah Keluar</th>
													<th>Customer</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; ?>
												<?php foreach ($outcoming_items as $outcoming_item) : ?>
													<tr>
														<td><?= $no++; ?></td>
														<td><?= $outcoming_item["tgl_barangkeluar"] ?></td>
														<td><?= $outcoming_item["kode_barangkeluar"] ?></td>
														<td><?= $outcoming_item["kode_barang"] ?></td>
														<td><?= $outcoming_item["nama_barang"] ?></td>
														<td><?= $outcoming_item["jml_barangkeluar"] ?></td>
														<td><?= $outcoming_item["nama_proyek"] ?></td>
														<td>
															<a href="<?= base_url("outcomingitem/delete/" . $outcoming_item["id_barangkeluar"]) ?>" class="btn btn-danger btn-circle btn-delete btn-sm"><i class="fas fa-trash"></i></a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
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
