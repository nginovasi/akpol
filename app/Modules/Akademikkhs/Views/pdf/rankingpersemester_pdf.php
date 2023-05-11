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
			<h4 align="center" style="text-decoration: underline; text-transform: uppercase;" >RANKING TARUNA Per Semester</h4>
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
                        <th>Semester</th>
						<th>NAP</th>
						<th>NPK</th>
						<th>NSP</th>
						<th>NJK</th>
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
                                <td><?=$item['semester']?></td>
								<td align="right"><?=$item['nap'].'<br>('.$item['nap_rank'].')'?></td>
								<td align="right"><?=$item['npk'].'<br>('.$item['npk_rank'].')'?></td>
								<td align="right"><?=$item['nsp'].'<br>('.$item['nsp_rank'].')'?></td>
								<td align="right"><?=$item['njk'].'<br>('.$item['njk_rank'].')'?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>


	<div style="height: 30px;"></div>
	<div style="width: 60%; margin-left: auto;  margin-right: 0;">
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
	</div>
</body>
</html>
