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
			<h4 align="center" style="text-decoration: underline;" >Data Absensi Perkuliahan</h4>
		</div>
		<div class="">
			<table>
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
				<tr>
					<td>KELOMPOK</td>
					<td> : </td>
					<td> <?=$kelompoktaruna?></td>
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
						<th colspan="4">TIDAK HADIR</th>
						<th rowspan="2" width="5%">H</th>
						<th rowspan="2" width="10%">JP</th>
						<th rowspan="2" width="10%">%</th>
					</tr>
					<tr>
						<th width="5%">S</th>
						<th width="5%">DK</th>
						<th width="5%">I</th>
						<th width="5%">D</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($data as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$item['nama_taruna']?></td>
								<td><?=$item['noaklong']?></td>
								<td align="right"><?=$item['sakit']?></td>
								<td align="right"><?=$item['dinas']?></td>
								<td align="right"><?=$item['ijin']?></td>
								<td align="right"><?=$item['deputasi']?></td>
								<td align="right"><?=$item['hadir']?></td>
								<td align="right"><?=$item['jumlah_pertemuan']?></td>
								<td align="right"><?=number_format($item['prosentase_kehadiran'])?>%</td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<?php 
		if (count($datasakit)!=0) {

	?>
	<pagebreak>
	<div style="margin-bottom: 20px">
		<div class="img-logo">
			<img src="http://devel.akpol.ac.id/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >ABSENSI KETIDAK HADIRAN TARUNA TK II DEN 55 SEMESTER III<br>
			DIKARENAKAN SAKIT KURANG DARI 25% TERPUTUS PUTUS<br>
			TA 2021
			</h4>
		</div>
	</div>
	<div>
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="5%">NO</th>
						<th >NAMA TARUNA</th>
						<th >NO AK</th>
						<th width="10%">S</th>
						<th width="10%">H</th>
						<th width="10%">JP</th>
						<th width="10%">%</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($datasakit as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$item['nama_taruna']?></td>
								<td><?=$item['noaklong']?></td>
								<td align="right"><?=$item['sakit']?></td>
								<td align="right"><?=$item['hadir']?></td>
								<td align="right"><?=$item['jumlah_pertemuan']?></td>
								<td align="right"><?=number_format($item['prosentase_kehadiran'])?>%</td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

	<?php
		}
	?>
</body>
</html>
