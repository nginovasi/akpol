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
	<?php
		function tgl_indo($tanggal){
			$bulan = array (
				1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);
			
		 
			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}
		 
	?>
	<div style="margin-bottom: 20px">
		<div class="img-logo">
			<img src="/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline; text-transform: uppercase;" >KARTU HASIL STUDI (KHS) <?=$datasemester['semester']?> TARUNA <?=$datasemester['tingkatan']?> / <?=$datataruna['angkatan']?></h4>
		</div>
		<div class="">
			<table>
				<tr>
					<td width="120px">NAMA</td>
					<td> : </td>
					<td style=" text-transform: uppercase;"> <?=$datataruna['namataruna']?></td>
				</tr>
				<tr>
					<td>NO. AK / KLS</td>
					<td> : </td>
					<td style=" text-transform: uppercase;"> <?=$datataruna['noaklong']?> / <?=$datataruna['kelompok']?></td>
				</tr>
				<tr>
					<td>TK/SEMESTER</td>
					<td> : </td>
					<td style=" text-transform: uppercase;"> <?=$datasemester['tingkatan']?> / <?=$datasemester['semester']?></td>
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
								<td align="right"><?=$item['nilai_akhir']?></td>
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
								<td><?=$item['nilai']?> <?=$item['satuan']?></td>
								<td align="right"><?=$item['nilai_akhir']?></td>
								<td><?=$item['klasifikasi']?></td>
								<td align="right"><?=$item['bobot']?></td>
								<td align="right"><?=$item['rerata']?></td>
							</tr>
					<?php }
					?>
					<tr>
						<td colspan="3" align="center" style="">NILAI BIDANG PENGETAHUAN</td>
						<td colspan="4"><?=$bidangpengetahuan['nilai']?></td>
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
						foreach ($aspekketerampilan as $item) { $no++; ?>
							<tr>
								<td height="20px"><?=$no?></td>
								<td align="center" style=""><?=$item['mata_pelajaran']?></td>
								<td><?=$item['nilai']?> <?=$item['satuan']?></td>
								<td align="right"><?=$item['nilai_akhir']?></td>
								<td><?=$item['klasifikasi']?></td>
								<td align="right"><?=$item['bobot']?></td>
								<td align="right"><?=$item['rerata']?></td>
							</tr>
					<?php }
					?>
					<tr>
						<td colspan="3" align="center" style="">NILAI BIDANG KETERAMPILAN</td>
						<td colspan="4" align="left"><?=$bidangketerampilan['nilai']?></td>
					</tr>
				</tbody>
			</table>
			<div style="height: 10px;"></div>
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">NILAI AKHIR PRESTASI (NAP) B, C</th>
						<th align="right"><?=($bidangpengetahuan['nilai']+$bidangketerampilan['nilai'])/2?></th>
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
								<td align="right"><?=$item['nilai_akhir']?></td>
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
								<td align="right"><?=$item['nilai_akhir']?></td>
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
						<th width="55%">NILAI AKHIR PRESTASI (NAP) A, B, C, D, E</th>
						<th align="right"><?=$nap['nilai']?></th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	<div style="height: 30px;"></div>
	<div style="width: 60%; margin-left: auto;  margin-right: 0;">
		<table width="100%" style="font-size: 12px">
			<tr>
				<td align="center">Semarang,  <?=tgl_indo(date("Y-m-d"))?></td>
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
