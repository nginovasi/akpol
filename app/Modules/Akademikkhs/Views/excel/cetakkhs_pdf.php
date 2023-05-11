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
			<h4 align="center" style="text-decoration: underline;" >KARTU HASIL STUDI (KHS) SEMESTER VI TARUNA TK III / 53</h4>
		</div>
		<div class="">
			<table>
				<tr>
					<td width="120px">NAMA</td>
					<td> : </td>
					<td> <?=$datataruna['namataruna']?></td>
				</tr>
				<tr>
					<td>NO. AK / KLS</td>
					<td> : </td>
					<td> <?=$datataruna['noaklong']?> / <?=$datataruna['kelompok']?></td>
				</tr>
				<tr>
					<td>TK/SEMESTER</td>
					<td> : </td>
					<td> III / IV</td>
				</tr>
			</table>
		</div>
	</div>

	<div >
		A. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASPEK KARAKTER
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">MATERI</th>
						<th >NILAI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($aspekkarakter as $item) { ?>
							<tr>
								<td align="center" style=""><?=$item['mata_pelajaran']?></td>
								<td><?=$item['nilai_akhir']?></td>
							</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div >
		B. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASPEK PENGETAHUAN
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th >NO</th>
						<th >MATA KULIAH</th>
						<th >SKS</th>
						<th >NILAI</th>
						<th >KLASIFIKASI</th>
						<th >BOBOT</th>
						<th >RERATA NILAI BATALYON</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($aspekpengetahuan as $item) { $no++; ?>
							<tr>
								<td height="20px"><?=$no?></td>
								<td align="center" style=""><?=$item['mata_pelajaran']?></td>
								<td></td>
								<td><?=$item['nilai_akhir']?></td>
								<td><?=$item['klasifikasi']?></td>
								<td><?=$item['bobot']?></td>
								<td></td>
							</tr>
					<?php }
					?>
					<tr>
						<td colspan="3" align="center" style="">NILAI BIDANG PENGETAHUAN</td>
						<td colspan="4"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div >
		C. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASPEK KETERAMPILAN
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th >NO</th>
						<th >MATA KULIAH</th>
						<th >SKS</th>
						<th >NILAI</th>
						<th >KLASIFIKASI</th>
						<th >BOBOT</th>
						<th >RERATA NILAI BATALYON</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($aspekpengetahuan as $item) { $no++; ?>
							<tr>
								<td height="20px"><?=$no?></td>
								<td align="center" style=""><?=$item['mata_pelajaran']?></td>
								<td></td>
								<td><?=$item['nilai_akhir']?></td>
								<td><?=$item['klasifikasi']?></td>
								<td><?=$item['bobot']?></td>
								<td></td>
							</tr>
					<?php }
					?>
					<tr>
						<td colspan="3" align="center" style="">NILAI BIDANG KETERAMPILAN</td>
						<td colspan="4"></td>
					</tr>
				</tbody>
			</table>
			<div style="height: 10px;"></div>
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">NILAI AKHIR PRESTASI (NAP)</th>
						<th ></th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div >
		D. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASPEK JASMANI
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">MATERI</th>
						<th >NILAI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($aspekjasmani as $item) { ?>
							<tr>
								<td align="center" style=""><?=$item['mata_pelajaran']?></td>
								<td><?=$item['nilai_akhir']?></td>
							</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div >
		E. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ASPEK KESEHATAN
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">MATERI</th>
						<th >NILAI</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($aspekkesehatan as $item) { ?>
							<tr>
								<td align="center" style=""><?=$item['mata_pelajaran']?></td>
								<td><?=$item['nilai_akhir']?></td>
							</tr>
					<?php }
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div >
		F. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NILAI AKHIR PRESTASI
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">NILAI AKHIR PRESTASI (NAP)</th>
						<th ></th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<div style="height: 30px;"></div>
	<div style="width: 60%; margin-left: auto;  margin-right: 0;">
		<table width="100%" style="font-size: 12px">
			<tr>
				<td align="center">Semarang, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Juli 2021</td>
			</tr>
			<tr>
				<td align="center">a.n. GUBERNUR AKADEMI KEPOLISIAN</td>
			</tr>
			<tr>
				<td align="center">WAGUB</td>
			</tr>
			<tr>
				<td align="center">U.b.</td>
			</tr>
			<tr>
				<td align="center">DIREKTUR AKADEMIK</td>
			</tr>
			<tr>
				<td height="50px"></td>
			</tr>
			<tr>
				<td align="center" style="text-decoration: underline;">Drs. DADIK SOESETYO SOELISTIJONO</td>
			</tr>
			<tr>
				<td align="center">KOMBES POL NRP 66080562</td>
			</tr>
		</table>
	</div>
</body>
</html>
