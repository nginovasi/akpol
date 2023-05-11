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

	    .tb-aspek td {
			padding: 10px;
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
			<h4 align="center" style="text-decoration: underline; text-transform: uppercase;" >KARTU HASIL STUDI (KHS) KENAIKAN TINGKAT ANGKATAN <?=$datataruna['angkatan']?></h4>
		</div>
		<div class="">
			<table>
				<tr>
					<td width="120px">NAMA</td>
					<td> : </td>
					<td style="text-transform: uppercase;"> <?=$datataruna['namataruna']?></td>
				</tr>
				<tr>
					<td>NO. AK / KLS</td>
					<td> : </td>
					<td style="text-transform: uppercase;"> <?=$datataruna['noaklong']?> / <?=$datataruna['kelompok']?></td>
				</tr>
				<tr>
					<td>KENAIKAN</td>
					<td> : </td>
					<td style="text-transform: uppercase;"> Dari <?=$datataruna['tingkatan']?> KE <?=$datataruna['next_tingkat']?></td>
				</tr>
			</table>
		</div>
	</div>
	<table width="100%" border="1" class="tb-aspek">
		<thead>
			<tr>
				<th rowspan="2">NO</th>
				<th rowspan="2">ASPEK</th>
				<th colspan="2">SEMESTER</th>
				<th rowspan="2">KUMULATIF</th>
			</tr>
			<tr>
				<?php foreach ($semester as $item) { ?>
					<th><?=$item['semester']?></th>
					
				<?php } ?>

<!-- 				<th>V</th>
				<th>VI</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 0;
					$dataganjil = 0;
					$datagenap = 0;
					$datakumulatif = 0;

				foreach ($data as $item) { $no++;
					$dataganjil = $dataganjil+$item['ganjil'];
					$datagenap = $datagenap+$item['genap'];
					$datakumulatif = $datakumulatif+$item['rata_rata'];
					?>

					<tr>
						<td align="center"><?=$no?></td>
						<td><?=$item['aspek']?></td>
						<td align="right"><?=round($item['ganjil'], 2)?></td>
						<td align="right"><?=round($item['genap'], 2)?></td>
						<td align="right"><?=round($item['rata_rata'], 2)?></td>
					</tr>
			<?php }
			?>
			<?php 
			if (count($data)==2) { ?>
					<tr>
						<td align="center">3</td>
						<td>Jasmani</td>
						<td align="right">0</td>
						<td align="right">0</td>
						<td align="right">0</td>
					</tr>
					<tr>
						<td align="center">4</td>
						<td>Kesehatan</td>
						<td align="right">0</td>
						<td align="right">0</td>
						<td align="right">0</td>
					</tr>
					<tr>
						<td align="center">5</td>
						<td>Karakter</td>
						<td align="right">0</td>
						<td align="right">0</td>
						<td align="right">0</td>
					</tr>

			<?php }
			?>
		</tbody>
	</table>
	<div style="height: 25px;"></div>

	<table width="100%" border="1" class="tb-aspek">
		<thead>
			<tr>
				<th colspan="2">NILAI AKHIR PRESTASI (NAP) SEMESTER</th>
				<th rowspan="2">NILAI PRESTASI (NAPK) SEMESTER KUMULATIF</th>
				<th rowspan="2">RANKING KENAIKAN</th>
			</tr>
			<tr>
				<?php foreach ($semester as $item) { ?>
					<th><?=$item['semester']?></th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center" style="height: 40px;"><?=round($dataganjil/5 , 2)?></td>
				<td align="center"><?=round($datagenap/5 , 2)?></td>
				<td align="center"><?=round($datakumulatif/5 , 2)?></td>
				<td align="center"><?=$ranking?></td>
			</tr>
		</tbody>
	</table>
	<div style="height: 30px;"></div>
	<?php 
				if ($datattd==true) {

					if ($_GET['trn']==1) {

						if ($datattd->id_taruna==1) { ?>
							<div style="width: 50%; margin-left: auto;  margin-right: 0;">
								<table width="100%" style="font-size: 12px">
									<tr>
										<td align="center">Semarang, <?=date("d")?> <?=date("M")?> <?=date("Y")?></td>
									</tr>
									<tr>
										<td align="center"><?=$datattd->jabatan?></td>
									</tr>
									<tr>
										<td height="50px" align="center">
											<?php
												if ($datattd->url_ttd==null or $datattd->url_ttd=='') {

												} else { ?>
													<img src="<?=$datattd->url_ttd?>" height="50px">
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td align="center" style="text-decoration: underline;"><?=$datattd->nama?></td>
									</tr>
									<tr>
										<td align="center"><?=$datattd->nrp?></td>
									</tr>
								</table>
							</div>
						<?php } else {

						}
					} else { ?>
							<div style="width: 50%; margin-left: auto;  margin-right: 0;">
								<table width="100%" style="font-size: 12px">
									<tr>
										<td align="center">Semarang, <?=date("d")?> <?=date("M")?> <?=date("Y")?></td>
									</tr>
									<tr>
										<td align="center"><?=$datattd->jabatan?></td>
									</tr>
									<tr>
										<td height="50px" align="center">
											<?php
												if ($datattd->url_ttd==null or $datattd->url_ttd=='') {

												} else { ?>
													<img src="<?=$datattd->url_ttd?>" height="50px">
												<?php }
											?>
										</td>
									</tr>
									<tr>
										<td align="center" style="text-decoration: underline;"><?=$datattd->nama?></td>
									</tr>
									<tr>
										<td align="center"><?=$datattd->nrp?></td>
									</tr>
								</table>
							</div>
						<?php }
				}


					?>
<!-- 	<div style="width: 60%; margin-left: auto;  margin-right: 0;">
		<table width="100%" style="font-size: 12px">
			<tr>
				<td align="center">Semarang, <?=tgl_indo(date("Y-m-d"))?></td>
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
	</div> -->
</body>
</html>
