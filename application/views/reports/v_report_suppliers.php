<!DOCTYPE html>
<html><head>
	<style>
		h1 {
			text-align: center;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
		}

		#laporan {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			font-size: 13px;
		}

		#laporan td,
		#laporan th {
			border: 1px solid #ddd;
			padding: 5px;
		}

		#laporan tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#laporan th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head><body>
	<h1>Rekap Data Pemasok</h1>
	<hr>
	<table id="laporan">
		<tr>
			<th>Kode Pemasok</th>
			<th>Nama Pemasok</th>
			<th>Email Pemasok</th>
			<th>No HP Pemasok</th>
			<th>Alamat Pemasok</th>
		</tr>
		<?php foreach ($suppliers as $Pemasok): ?>
			<tr>
				<td><?=$Pemasok["kode_pemasok"]?></td>
				<td><?=$Pemasok["nama_pemasok"]?></td>
				<td><?=$Pemasok["email_pemasok"]?></td>
				<td><?=$Pemasok["no_pemasok"]?></td>
				<td><?=$Pemasok["alamat_pemasok"]?></td>
			</tr>
		<?php endforeach;?>
	</table>
</body></html>
