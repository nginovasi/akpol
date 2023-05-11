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
			<h4 align="center" style="text-decoration: underline;" >NILAI JASMANI</h4>
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
						<th rowspan="2">GENDER</th>
						<th rowspan="2">NO AK</th>
						<th rowspan="2">KELOMPOK</th>
						<th colspan="2">LARI</th>
						<th colspan="2">PULL UP/CHINNI</th>
						<th colspan="2">SIT UP</th>
						<th colspan="2">PUSH UP</th>
						<th colspan="2">SHUTTLE RUN</th>
						<th colspan="2">SAMAPTA</th>
						<th colspan="2">HER</th>
						<th ></th>
						<th colspan="4">NILAI AKHIR</th>
					</tr>
					<tr>
						<th>METER</th>
						<th>NILAI</th>
						<th>JUMLAH</th>
						<th>NILAI</th>
						<th>JUMLAH</th>
						<th>NILAI</th>
						<th>JUMLAH</th>
						<th>NILAI</th>
						<th>WAKTU</th>
						<th>NILAI</th>
						<th>SAMAPTA A</th>
						<th>SAMAPTA B</th>
						<th>HER 1</th>
						<th>HER 2</th>
						<th>SYARAT PENILAIAN</th>
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
								<td><?=$item['gender']?></td>
								<td><?=$item['noaklong']?></td>
								<td><?=$item['kelompok']?></td>
								<td align="right"><?=$item['lari_jumlah']?></td>
								<td align="right"><?=$item['lari_nilai']?></td>
								<td align="right"><?=$item['pull_up_jumlah']?></td>
								<td align="right"><?=$item['pull_up_nilai']?></td>
								<td align="right"><?=$item['sit_up_jumlah']?></td>
								<td align="right"><?=$item['sit_up_nilai']?></td>
								<td align="right"><?=$item['push_up_jumlah']?></td>
								<td align="right"><?=$item['push_up_nilai']?></td>
								<td align="right"><?=$item['run_jumlah']?></td>
								<td align="right"><?=$item['run_nilai']?></td>
								<td align="right"><?=$item['samapta_a']?></td>
								<td align="right"><?=$item['samapta_b']?></td>
								<td align="right"><?=$item['her']?></td>
								<td align="right"><?=$item['her_2']?></td>
								<td align="right"><?=$item['id_syarat_penilaian']?></td>
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
