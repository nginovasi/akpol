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

	    .img-logo-taruna {
	    	height: 120px;
	    }

	    .tb-aspek th {
			padding: 5px;
	    }

	    .tb-aspek td {
			padding: 5px;
	    }

	</style>

	<?php

		function getBulan($bln){
			    switch ($bln){
			     case 1:
			      return "Januari";
			      break;
			     case 2:
			      return "Februari";
			      break;
			     case 3:
			      return "Maret";
			      break;
			     case 4:
			      return "April";
			      break;
			     case 5:
			      return "Mei";
			      break;
			     case 6:
			      return "Juni";
			      break;
			     case 7:
			      return "Juli";
			      break;
			     case 8:
			      return "Agustus";
			      break;
			     case 9:
			      return "September";
			      break;
			     case 10:
			      return "Oktober";
			      break;
			     case 11:
			      return "November";
			      break;
			     case 12:
			      return "Desember";
			      break;
			    }
			   }
	?>
	<div style="height: 50%">
		
		<div style="margin-bottom: 20px">
			<table width="100%" style="margin-bottom: 10px">
				<tr>
					<td rowspan="2" width="10%">
						<div class="img-logo">
							<img src="http://devel.akpol.ac.id/assets/img/akpol_logo100.png" class="img-logo-atas" >
						</div>
					</td>
					<td style="font-weight: bold; font-size: 18px">AKADEMI KEPOLISIAN</td>
				</tr>
				<tr>
					<td style=" font-size: 13px">Jl. Sultan Agung No. 131, Candi Baru, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232</td>
				</tr>
			</table>
			<div style="border-top: 3px solid black; "></div>
			<div style="padding-left: 15% ; padding-right: 15%">
				<div class="" style="border: 2px solid black; margin-top: 25px; width: 100%; ">
					<h4 align="center" style="font-weight: bold;" >KARTU UJIAN</h4>
				</div>
				<br>
				<div>
					<table width="100%" >
						<tr>
							<td rowspan="5" width="30%" style="">
								<div class="img-logo">
									<img src="<?=$datataruna['photopath']?>" class="img-logo-taruna" style="border: 1px solid black" >
								</div></td>
							<td width="30%">NO. AK</td>
							<td width="2%"> : </td>
							<td width="38%"> <?=$datataruna['noaklong']?></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td>:</td>
							<td> <?=$datataruna['namataruna']?></td>
						</tr>
						<tr>
							<td>BATALYON</td>
							<td>:</td>
							<td> <?=$datataruna['batalyon']?> </td>
						</tr>
						<tr>
							<td>SEMESTER</td>
							<td>:</td>
							<td> <?=$datataruna['semester']?></td>
						</tr>
						<tr>
							<td>TAHUN AJARAN</td>
							<td>:</td>
							<td> 2021</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div style="width: 60%; margin-left: auto;  margin-right: 0;">
			<table width="100%" style="font-size: 12px">
				<tr>
					<td align="center">Semarang, <?=date("d")?> <?=date("M")?> 2021</td>
				</tr>
				<tr>
					<td align="center">Kabag jarlat</td>
				</tr>
				<tr>
					<td height="50px"></td>
				</tr>
				<tr>
					<td align="center" style="text-decoration: underline;">Anak Agung Made Sudana</td>
				</tr>
				<tr>
					<td align="center">NRP 66060668</td>
				</tr>
			</table>
		</div>
	</div>
	<div style="height: 50%">
		<br>

		<br>
		
		<div>
			<h4 align="center" style="" >Jadwal UAS Semester Ganjil Tahun Ajaran 2021</h4>
			<h4 align="center" style="" >Kelompok Kelas <?=$datataruna['kelompok']?></h4>
		</div>
		<br>
		<div>
			<table width="100%" border="1" class="tb-aspek">
				<tr>
					<th width="5%">No</th>
					<th width="20%">Hari/Tanggal</th>
					<th width="20%">Mata Pelajaran</th>
					<th width="15%">Jam</th>
					<th width="15%">Ruangan</th>
					<th width="25%">Tanda Tangan Pengawas</th>
				</tr>
				<?php 
				$no = 0;
					foreach ($querymatapelajaran as $item) { $no++; ?>

					<tr>
						<td><?=$no?></td>
						<td><?=date("d" , strtotime($item['tanggal'])) ?> <?=getBulan(date("m" , strtotime($item['tanggal'])))?> <?=date("Y" , strtotime($item['tanggal'])) ?></td>
						<td><?=$item['mata_pelajaran']?></td>
						<td><?=date("H:i" , strtotime($item['jam_mulai']))?> - <?=date("H:i" , strtotime($item['jam_selesai']))?></td>
						<td><?=$item['nama_ruangan']?></td>
						<td  style="<?=$no % 2 == 0 ? 'padding-left: 75px': '' ?>" ><?=$no?></td>
					</tr>

				<?php  } ?>
			</table>
		</div>
	</div>
</body>
</html>
