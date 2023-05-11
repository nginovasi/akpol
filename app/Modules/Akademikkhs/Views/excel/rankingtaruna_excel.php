<?php

	ob_end_clean();
	header( "Content-type: application/vnd.ms-excel" );
	header('Content-Disposition: attachment; filename="'. $nama_file.'.xls"');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
	ob_end_clean();
?>
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
		<div class="">
			<h4 align="center" style="text-decoration: underline; text-transform: uppercase;" >RANKING TARUNA</h4>
		</div>
		<!-- <div class="">
			<table >
				<tr>
					<td width="120px">NAMA</td>
					<td> : </td>
					<td style=" text-transform: uppercase;"> </td>
				</tr>
				<tr>
					<td>NO. AK / KLS</td>
					<td> : </td>
					<td style=" text-transform: uppercase;"> </td>
				</tr>
				<tr>
					<td>TK/SEMESTER</td>
					<td> : </td>
					<td style=" text-transform: uppercase;"> </td>
				</tr>
			</table>
		</div> -->
	</div>
	<div >
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Taruna/i</th>
						<th>Batalyon</th>
						<th>Karakter</th>
						<th>Pengetahuan</th>
						<th>Keterampilan</th>
						<th>Jasmani</th>
						<th>Kesehatan</th>
						<th>Rerata</th>
						<th>Ranking</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($data as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$item['namataruna']?></td>
								<td><?=$item['nama_gender']?></td>
								<td><?=$item['batalyon']?></td>
								<td align="right"><?=$item['karakter']?></td>
								<td align="right"><?=$item['pengetahuan']?></td>
								<td align="right"><?=$item['keterampilan']?></td>
								<td align="right"><?=$item['jasmani']?></td>
								<td align="right"><?=$item['kesehatan']?></td>
								<td align="right"><?=$item['rerata']?></td>
								<td align="right"><?=$item['ranking']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>


	<div style="height: 30px;"></div>


</body>
</html>
