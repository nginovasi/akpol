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
			font-size: 11px;

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
					<tr>
						<td align="center" style="">NILAI BIDANG KARAKTER</td>
						<td align="right"><?=$nilai_karakter==null? '0' : $nilai_karakter['nilai_akhir'] ?></td>
					</tr>
				

					<!-- <?php
						if (isset($data[0]['karakter'])=='') {
							?>
							<tr>
								<td align="left" style="">&nbsp;</td>
								<td align="right"></td>
							</tr>
							<?php

						} else {

							foreach (json_decode($data[0]['karakter'], true) as $item) { ?>
								<tr>
									<td align="left" style=""><?=$item['matkul']?></td>
									<td align="right"><?=round($item['nilai'],2 )?></td>
								</tr>
						<?php }
						}
					?> -->
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
						<th width="5%">NO</th>
						<th width="40%">MATA KULIAH</th>
						<th width="8%">SKS</th>
						<th width="8%">NILAI</th>
						<th width="15%">KLASIFIKASI</th>
						<th width="10%">BOBOT</th>
						<th width="14%">RERATA NILAI BATALYON</th>
					</tr>
				</thead>
				<tbody>
					<?php

						$no = 0;
						if (isset($data[0]['pengetahuan'])=='') {
							?>
							<tr>
								<td height="20px">&nbsp;</td>
								<td align="left" style=""></td>
								<td></td>
								<td align="right"></td>
								<td style="font-size: 11px"></td>
								<td align="right"></td>
								<td align="right"></td>
							</tr>
							<?php

						} else {

							foreach (json_decode($data[0]['pengetahuan'], true) as $item) { $no++; ?>
							<tr>
								<td height="20px"><?=$no?></td>
								<td align="left" style=""><?=$item['matkul']?></td>
								<td><?=$item['sks']?></td>
								<td align="right"><?=round($item['nilai'], 2)?></td>
								<td style="font-size: 11px"><?=$item['klasifikasi']?></td>
								<td align="right"><?=round($item['bobot'], 2)?></td>
								<td align="right"><?=round($item['rata'], 2)?></td>
							</tr>
					<?php }
						}
						
					?>
					<tr>
						<td colspan="3" align="center" style="">NILAI BIDANG PENGETAHUAN</td>
						<td colspan="4"><?php if (isset($data[0]['rata_pengetahuan'])) {
							echo round($data[0]['rata_pengetahuan'], 2)==0? '0' : round($data[0]['rata_pengetahuan'], 2);
						}  ?></td>
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
						<th width="5%">NO</th>
						<th width="40%">MATA KULIAH</th>
						<th width="8%">SKS</th>
						<th width="8%">NILAI</th>
						<th width="15%">KLASIFIKASI</th>
						<th width="10%">BOBOT</th>
						<th width="14%">RERATA NILAI BATALYON</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;

						if (isset($data[0]['keterampilan'])=='') {
							?>
							<tr>
								<td height="20px">&nbsp;</td>
								<td align="left" style=""></td>
								<td></td>
								<td align="right"></td>
								<td style="font-size: 11px"></td>
								<td align="right"></td>
								<td align="right"></td>
							</tr>
							<?php

						} else {

							foreach (json_decode($data[0]['keterampilan'], true) as $item) { $no++; ?>
							<tr>
								<td height="20px"><?=$no?></td>
								<td align="left" style=""><?=$item['matkul']?></td>
								<td><?=$item['sks']?></td>
								<td align="right"><?=round($item['nilai'],2)?></td>
								<td style="font-size: 11px"><?=$item['klasifikasi']?></td>
								<td align="right"><?=round($item['bobot'],2)?></td>
								<td align="right"><?=round($item['rata'], 2)?></td>
							</tr>
					<?php }
						}

						
					?>
					<tr>
						<td colspan="3" align="center" style="">NILAI BIDANG KETERAMPILAN</td>
						<td colspan="4"><?php if (isset($data[0]['rata_keterampilan'])) {
							echo round($data[0]['rata_keterampilan'], 2)==0? '0' : round($data[0]['rata_keterampilan'], 2);
						}  ?></td>
					</tr>
				</tbody>
			</table>
			<div style="height: 10px;"></div>
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">NILAI AKHIR PRESTASI (NAP) B, C</th>
						<th align="right"><?php if (isset($data[0]['rata_keterampilan'])) { echo round(($data[0]['rata_pengetahuan']+$data[0]['rata_keterampilan'])/2, 2)==0? '' : round(($data[0]['rata_pengetahuan']+$data[0]['rata_keterampilan'])/2, 2); }?></th>
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

					<tr>
						<td align="center" style="">NILAI BIDANG JASMANI</td>
						<td align="right"><?=$nilai_jasmani==null? '0' : $nilai_jasmani['nilai_akhir'] ?></td>
					</tr>
<!-- 					<?php

						if (isset($data[0]['jasmani'])=='') {
							?>
							<tr>
								<td align="left" style="">&nbsp;</td>
								<td align="right"></td>
							</tr>
							<?php

						} else {

							foreach (json_decode($data[0]['jasmani'], true) as $item) { ?>
							<tr>
								<td align="left" style=""><?=$item['matkul']?></td>
								<td align="right"><?=round($item['nilai'],2)?></td>
							</tr>
					<?php }
						}
						
					?> -->
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
					<tr>
						<td align="center" style="">NILAI BIDANG KESEHATAN</td>
						<td align="right"><?=$nilai_kesehatan==null? '0' : $nilai_kesehatan['nilai_akhir'] ?></td>
					</tr>
					<!-- <?php
						if (isset($data[0]['kesehatan'])=='') {
							?>
							<tr>
								<td align="left" style="">&nbsp;</td>
								<td align="right"></td>
							</tr>
							<?php

						} else {

							foreach (json_decode($data[0]['kesehatan'], true) as $item) { ?>
							<tr>
								<td align="left" style=""><?=$item['matkul']?></td>
								<td align="right"><?=round($item['nilai'],2)?></td>
							</tr>
					<?php }
						}
						
					?> -->
				</tbody>
			</table>
		</div>
	</div>
	<div style="height: 15px;"></div>
	<div >
		F. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NILAI AKHIR PRESTASI
		<div style="width: 93%; margin-left: auto;  margin-right: 0;">
		<?php 
			$rata_pengetahuan = $data[0]['rata_pengetahuan']==0 ? '0' : $data[0]['rata_pengetahuan'];
			$rata_keterampilan = $data[0]['rata_keterampilan']==0 ? '0' : $data[0]['rata_keterampilan'];
			$rata_karakter = $nilai_karakter==null? '0' : $nilai_karakter['nilai_akhir'];
			$rata_kesehatan = $nilai_kesehatan==null? '0' : $nilai_kesehatan['nilai_akhir'];
			$rata_jasmani = $nilai_jasmani==null? '0' : $nilai_jasmani['nilai_akhir'];
		?>
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th width="55%">NILAI AKHIR PRESTASI (NAP) A, B, C, D, E</th>
						<th align="right"><?php if (isset($data[0]['rata_keterampilan'])) { echo round(($rata_pengetahuan+$rata_keterampilan+$rata_karakter+$rata_kesehatan+$rata_jasmani)/5, 2)==0? '0' : round(($rata_pengetahuan+$rata_keterampilan+$rata_karakter+$rata_kesehatan+$rata_jasmani)/5, 2); } ?></th>
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
