<!DOCTYPE html>
<html>
<head>
	<title><?=$nama_file?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
		function hari_ini($tgl){
			$hari = date("D" , strtotime($tgl));
		 
			switch($hari){
				case 'Sun':
					$hari_ini = "Minggu";
				break;
		 
				case 'Mon':			
					$hari_ini = "Senin";
				break;
		 
				case 'Tue':
					$hari_ini = "Selasa";
				break;
		 
				case 'Wed':
					$hari_ini = "Rabu";
				break;
		 
				case 'Thu':
					$hari_ini = "Kamis";
				break;
		 
				case 'Fri':
					$hari_ini = "Jumat";
				break;
		 
				case 'Sat':
					$hari_ini = "Sabtu";
				break;
				
				default:
					$hari_ini = "Tidak di ketahui";		
				break;
			}
		 
			return "<b>" . $hari_ini . "<br>" .date("d" , strtotime($tgl))."</b>";
		 
		}
	?>
	<div style="height: 50%">
		
		<!-- <div style="margin-bottom: 20px">
			<table width="100%" style="margin-bottom: 10px">
				<tr>
					<td rowspan="2" width="10%">
						<div class="img-logo">
							<img src="/assets/img/akpol_logo100.png" class="img-logo-atas" >
						</div>
					</td>
					<td style="font-weight: bold; font-size: 18px">AKADEMI KEPOLISIAN</td>
				</tr>
				<tr>
					<td style=" font-size: 13px">Jl. Sultan Agung No. 131, Candi Baru, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232</td>
				</tr>
			</table>
			<div style="border-top: 3px solid black; "></div>
		</div> -->
		<div>
			<?php 
				$tgl = str_replace("/", "-", $_GET['tanggal']);
			?>
			<table width="100%">
				<tr>
					<td rowspan="2" align="center" style="width: 50%; padding-right: 300px;">DIREKTORAT AKADEMIK<br>BAG JARLAT</td>
					<td width="10%">JADWAL</td>
					<td width="40%">: <?=$judul['jadwal']?></td>
				</tr>
				<tr>
					<td>TANGGAL</td>
					<td>: <?=date("d" , strtotime($tgl))?> S.D <?=date("d M Y", strtotime("$tgl +6 day"))?></td>
				</tr>
				<!-- <tr>
					<td>TEMPAT</td>
					<td>:</td>
				</tr> -->
			</table>
		</div>
		<div>
			<table width="100%" border="1">
				<thead>
					<tr>
						<th rowspan="2" >Hari</th>
						<th rowspan="2" >Unit</th>
						<th rowspan="2" >Jam</th>
						<?php
							foreach ($data['header'] as $item) { ?>
								<th width="10%"><?=$item['nama_kelompok']?></th>
						<?php }
						?>
					</tr>
					<tr>
						<?php
							foreach ($data['header'] as $item) { ?>
								<th ><?=$item['nama_ruangan']?></th>
						<?php }
						?>
					</tr>
				</thead>
				<tbody>
					<?php
						$databody = $data['body'];
						foreach ($databody as $key => $value) { ?>
							<tr>
								<td rowspan="8" align='center'><?=hari_ini($databody[$key]['tanggal'])?></td>
							</tr>
								<?php
									$arrunit = json_decode($databody[$key]['data_unit'], true);
                                    usort($arrunit, function($a , $b) { return $a['id_pertemuan'] - $b['id_pertemuan']; });
                                    foreach ($arrunit as $unit) { ?>
                                    	<tr>
	                                    	<td align='center'><?=$unit['unit_pertemuan']?></td>
	                                    	<td align='center'><?=$unit['jam_mulai']?> - <?=$unit['jam_selesai']?></td>
	                                    	<?php
												foreach ($data['header'] as $item) { ?>
		                                    	<?php
		                                    		if ($unit['id_pertemuan']==1) {
		                                    			echo "<td align='center'>OR. Pagi</td>";
		                                    		} else if ($unit['id_pertemuan']==5) {
		                                    			echo "<td align='center'>ISOMA</td>";
		                                    		} else { ?>
					                                    	<?php 
																$content = array_filter($data['content'], function($arr) use ($databody,$unit,$item,$key){
																	return $arr['tanggal']==$databody[$key]['tanggal'] && $arr['id_jam_pertemuan']==$unit['id_pertemuan'] && $arr['id_kelompok_taruna']==$item['id_kelompok'];
																} );
															?>
					                                    	<td  align='center'><?=count($content)>0? array_values($content)[0]['kode_mk'].' : '.array_values($content)[0]['jumlah_pertemuan'].'-'.array_values($content)[0]['pertemuan_ke'].'='.array_values($content)[0]['sisa_pertemuan'] : '' ?></td>
		                                    		<?php }
		                                    	?>
											<?php }
											?>
                                    	</tr>
                                <?php }
								?>
					<?php }
						?>
					
				</tbody>
			</table>
		</div>
		<pagebreak>
		<div>
			Keterangan
			<table width="50%" border="1">
				<tr>
					<th>Kode MK</th>
					<th>Pelajaran</th>
					<th>Pendidik</th>
				</tr>
				<?php
					foreach ($katim as $item) { ?>
						<tr>
							<td><?=$item['kode_mk']?></td>
							<td><?=$item['mata_pelajaran']?></td>
							<td><?=$item['namagadik']?> & tim</td>
						</tr>
					<?php }
				?>
			</table>
		</div>
	</div>
</body>
</html>
