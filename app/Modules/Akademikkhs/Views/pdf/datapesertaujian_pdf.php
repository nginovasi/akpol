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
			<img src="/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >Data Absensi Ujian</h4>
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
				<tr>
					<td>KELOMPOK</td>
					<td> : </td>
					<td> <?=$kelompok?></td>
				</tr>
			</table>
		</div>
	</div>
	<div >
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th >NO</th>
						<th >NAMA TARUNA</th>
						<th >NO AK</th>
						<th >KELAYAKAN</th>
						<th >UTS</th>
						<th >UAS</th>
						<th >CATATAN</th>
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
								<td align="right"><?=number_format($item['kehadiran'])?>%</td>
								<td><?=$item['is_uts']==1? '✓': ''?></td>
								<td><?=$item['is_uas']==1? '✓': ''?></td>
								<td><?=$item['keterangan']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
