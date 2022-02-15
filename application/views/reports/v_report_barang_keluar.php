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
<h1>Rekap Barang Keluar</h1>
<hr>
	<table id="laporan">
		<tr>
			<th>Kode Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Email Pelanggan</th>
			<th>No HP Pelanggan</th>
			<th>Alamat Pelanggan</th>
		</tr>
		<?php foreach ($customers as $customer): ?>
			<tr>
				<td><?=$customer["kode_pelanggan"]?></td>
				<td><?=$customer["nama_pelanggan"]?></td>
				<td><?=$customer["email_pelanggan"]?></td>
				<td><?=$customer["no_pelanggan"]?></td>
				<td><?=$customer["alamat_pelanggan"]?></td>
			</tr>
		<?php endforeach;?>
	</table>
</body></html>
