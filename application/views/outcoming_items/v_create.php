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
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-8 mx-auto">
											<form action="<?= base_url("outcomingitem/create") ?>" method="post">
												<div class="form-group">
													<label for="outcoming_item_code">Kode Transaksi</label>
													<input type="text" class="form-control" name="outcoming_item_code" id="outcoming_item_code" placeholder="Kode Transaksi" value="<?= $outcoming_item_code ?>" readonly>
												</div>
												<div class="form-group">
													<label for="id_customer">Proyek</label>
													<select name="id_proyek" id="id_proyek" class="form-control select2">
														<option value="" disabled selected>--Pilih Proyek--</option>
														<?php foreach ($proyek as $proyek) : ?>
															<option value="<?= $proyek["id_proyek"] ?>"><?= $proyek["kode_proyek"] ?> | <?= $proyek["nama_proyek"] ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('id_customer', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="id_items">Barang</label>
													<select name="id_items" id="ItemId" class="form-control select2">
														<option value="" disabled selected>--Pilih Barang--</option>
														<?php foreach ($barang as $item) : ?>
															<option value="<?= $item["id_barang"] ?>"><?= $item["kode_barang"] ?> | <?= $item["nama_barang"] ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('id_items', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
												</div>
												<div class="form-group">
													<label for="item_stock">Stock Barang</label>
													<input type="number" class="form-control" name="item_stock" id="ItemStock" placeholder="Stock Barang" readonly>
												</div>
												<div class="form-group">
													<label for="outcoming_item_qty">Jumlah Stok Keluar</label>
													<div class="input-group">
														<input type="number" class="form-control <?= form_error('outcoming_item_qty') ? 'is-invalid' : '' ?>" name="outcoming_item_qty" id="OutcomingItemQty" placeholder="Jumlah Stok Masuk">
														<div class="input-group-append">
															<span class="input-group-text" id="unitName">Satuan</span>
														</div>
														<?= form_error('outcoming_item_qty', '<div class="invalid-feedback font-weight-bold pl-1">', '</div>') ?>
													</div>
												</div>
												<div class="form-group">
													<label for="item_stock_total">Sisa Total Stock</label>
													<input type="number" class="form-control" name="item_stock_total" id="ItemStockTotal" placeholder="Jumlah Total Stock" readonly>
												</div>
												<hr>
												<div class="form-action">
													<button type="submit" class="btn btn-primary btn-lg">Simpan Data</button>
													<a href="<?= base_url("outcomingitem") ?>" class="btn btn-info btn-lg">Kembali</a>
													<!-- <button type="reset" class="btn btn-warning btn-lg">Reset Form</button> -->
												</div>
											</form>
										</div>
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
	<script>
		$(document).ready(function() {

			var total = null;
			var dataItem = <?= json_encode($barang) ?>;
			$('#ItemId').change(function(e) {
				e.preventDefault();
				var value = $(this).val();
				var barang = dataItem.filter(item => item.id_barang == value);
				if (barang.length == 0) {
					return
				}
				barang = barang[0];
				

				var unitName = barang.nama_satuan;
				$('#unitName').text(unitName);

			})

			$('#OutcomingItemQty').keyup(function() {
				var value = $(this).val();
				if (!value)
					value = 0
				$('#ItemStockTotal').val(parseInt(value) + parseInt(total));
			});

		});
	</script>

	<script>
		$(document).ready(function() {

			var total = null;
			var dataItem = <?= json_encode($barang) ?>;
			$('#ItemId').change(function(e) {
				e.preventDefault();
				var value = $(this).val();
				var barang = dataItem.filter(item => item.id_barang == value);
				if (barang.length == 0) {
					return
				}
				barang = barang[0];
				var stock = barang.stok_barang;
				$('#ItemStock').val(stock);
				var stockIn = $('#OutcomingItemQty').val();
				var totalStock = stock - stockIn;
				total = totalStock;
				$('#ItemStockTotal').val(totalStock);

				var unitName = barang.unit_name;
				$('#unitName').text(unitName);

			})

			$('#OutcomingItemQty').keyup(function() {
				var total = $('#ItemStock').val();
				var value = $(this).val();

				if (!total) {
					total = 0;
				}

				total = parseInt(total);

				if (!value)
					value = 0
				value = parseInt(value);
				if (value > total) {
					$('#errorValue').show();
					$('button[type="submit"]').prop('disabled', true);
					$('#ItemStockTotal').val(total);
					return
				} else {
					$('#errorValue').hide();
					$('button[type="submit"]').prop('disabled', false);
				}
				$('#ItemStockTotal').val(parseInt(total) - parseInt(value));
			});

		});
	</script>


</body>

</html>