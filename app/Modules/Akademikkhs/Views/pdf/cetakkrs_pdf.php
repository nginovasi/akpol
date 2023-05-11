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
			<h4 align="center" style="text-decoration: underline; text-transform: uppercase;" >KARTU RENCANA STUDI (KRS) <?=$datasemester['semester']?> TARUNA <?=$datasemester['tingkatan']?> / <?=$datataruna['angkatan']?></h4>
		</div>
		<div class="">
			<table >
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
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th >NO</th>
						<th >KD</th>
						<th >MATA KULIAH</th>
						<th >SKS</th>
						<th >ASPEK</th>
						<th >KETUA PENDIDIK</th>
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
								<td><?=$item['nilai'].' '.$item['satuan']?></td>
								<td><?=$item['aspek']?></td>
								<td><?=$item['namagadik']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>


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
</body>
</html>
