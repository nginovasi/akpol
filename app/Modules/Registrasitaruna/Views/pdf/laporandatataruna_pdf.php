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

		.img-logo {
	        text-align: center;
	      }
	    .img-logo-atas {
	    	width: 50px;
	    }

	    table tr td {
	    	padding-left: 5px;
	    }
	</style>

	<div class="img-logo">
			<img src="assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >Data Taruna</h4>
			<h4 align="center" >Batalyon <?=$_GET['nama_batalyon']?> - <?=$_GET['thun_batalyon']?>  </h4>
		</div>
	<table width="100%" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kelompok</th>
				<th>Nama</th>
				<th>NO AK Short</th>
				<th>NO AK Long</th>
			</tr>
		</thead>

	<?php

		$no = 0;
		foreach ($data as $item) { $no++; ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$item['nama_kelompok']?></td>
				<td><?=$item['namataruna']?></td>
				<td><?=$item['noakshort']?></td>
				<td><?=$item['noaklong']?></td>
			</tr>
		<?php }
	?>
	</table>

</body>
</html>
