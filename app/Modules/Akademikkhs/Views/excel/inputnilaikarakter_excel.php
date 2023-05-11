<?php

	ob_end_clean();
	header( "Content-type: application/vnd.ms-excel" );
	header('Content-Disposition: attachment; filename="'. $nama_file.'.xls"');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	ob_end_clean();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$nama_file?></title>
</head>
<body>
	<style type="text/css">
		body {
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
		}


		.img-logo {
	        text-align: center;
	      }
	    .img-logo-atas {
	    	width: 50px;
	    }

	    .tb-aspek th {
			padding: 5px;
	    }

	    .tb-aspek td {
			padding: 5px;
	    }

	</style>

	<div style="margin-bottom: 20px">
		<div class="img-logo">
			<img src="http://devel.akpol.ac.id/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >NILAI KARAKTER</h4>
		</div>
		<div class="">
			<table>
				<tr>
					<td width="120px">BATALYON</td>
					<td> : </td>
					<td> <?=$batalyon?></td>
				</tr>
				<tr>
					<td width="120px">SEMESTER</td>
					<td> : </td>
					<td> <?=$semester?></td>
				</tr>
				<tr>
					<td>MATA PELAJARAN</td>
					<td> : </td>
					<td> <?=$matapelajaran?></td>
				</tr>
			</table>
		</div>
	</div>
	<div >
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th rowspan="2">NO</th>
						<th rowspan="2">NAMA TARUNA</th>
						<th rowspan="2">NO AK</th>
						<th rowspan="2">KELOMPOK</th>
						<th colspan="7"></th>
						<th colspan="4">NILAI AKHIR</th>
					</tr>
					<tr>
						<th>BLN 1</th>
						<th>BLN 2</th>
						<th>BLN 3</th>
						<th>BLN 4</th>
						<th>BLN 5</th>
						<th>BLN 6</th>
						<th>HER</th>
						<th>NILAI AKHIR</th>
						<th>KATEGORI</th>
						<th>BOBOT</th>
						<th>KLASIFIKASI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($data as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$item['namataruna']?></td>
								<td><?=$item['noaklong']?></td>
								<td><?=$item['kelompok']?></td>
								<td align="right"><?=$item['bulan_1']?></td>
								<td align="right"><?=$item['bulan_2']?></td>
								<td align="right"><?=$item['bulan_3']?></td>
								<td align="right"><?=$item['bulan_4']?></td>
								<td align="right"><?=$item['bulan_5']?></td>
								<td align="right"><?=$item['bulan_6']?></td>
								<td align="right"><?=$item['her']?></td>
								<td align="right"><?=$item['nilai_akhir']?></td>
								<td align="center"><?=$item['kategori']?></td>
								<td align="right"><?=$item['bobot']?></td>
								<td ><?=$item['klasifikasi']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
