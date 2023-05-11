<!DOCTYPE html>
<html>
<head>
	<title><?=$nama_file?></title>
</head>
<body>
	<style type="text/css">
		table {
			border-collapse: collapse;
		}
	</style>
	<table width="100%" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Mata Kuliah</th>
				<th>Jumlah</th>
				<th>Type</th>
				<th>Ketua Pendidik</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
			foreach ($data as $item) { $no++; ?>
				<tr>
					<td><?=$no?></td>
					<td><?=$item['kode_mk']?></td>
					<td><?=$item['mata_pelajaran']?></td>
					<td><?=$item['nilai']?></td>
					<td><?=$item['satuan']?></td>
					<td><?=$item['namagadik']?></td>
				</tr>
			<?php }
			?>
		</tbody>
	</table>
</body>
</html>
