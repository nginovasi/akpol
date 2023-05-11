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

	<div style="margin-bottom: 20px">
		<div class="img-logo">
			<img src="http://devel.akpol.ac.id/assets/img/akpol_logo100.png" class="img-logo-atas" >
		</div>
		<div class="">
			<h4 align="center" style="text-decoration: underline;" >DATA PENDIDIK</h4>
		</div>
	</div>
	<div >
		<div style="width: 100%; margin-left: auto;  margin-right: 0;">
			<table width="100%" border="1" class="tb-aspek">
				<thead>
					<tr>
						<th><span>#</span></th>
                        <th><span>NRP</span></th>
                        <th><span>NIK</span></th>
                        <th><span>NAMA</span></th>
                        <th><span>TELP</span></th>
                        <th><span>EMAIL</span></th>
                        <th><span>JENIS KELAMIN</span></th>
                        <th><span>TAMPAT LAHIR</span></th>
                        <th><span>TANGGAL LAHIR</span></th>
                        <th><span>AGAMA</span></th>
                        <th><span>PROVINSI</span></th>
                        <th><span>KAB / KOTA</span></th>
                        <th><span>KECAMATAN</span></th>
                        <th><span>KELURAHAN</span></th>
                        <th><span>ALAMAT</span></th>

					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						foreach ($data as $item) { $no++; ?>
							<tr>
								<td><?=$no?></td>
								<td>'<?=$item['nrp']?></td>
								<td>'<?=$item['nik']?></td>
								<td><?=$item['namagadik']?></td>
								<td><?=$item['telp']?></td>
								<td><?=$item['email']?></td>
								<td><?=$item['nama_gender']?></td>
								<td><?=$item['nama_kabkota_lhr']?></td>
								<td>'<?=$item['tglhr']?></td>
								<td><?=$item['nama_agama']?></td>
								<td><?=$item['nama_prov_ktp']?></td>
								<td><?=$item['nama_kota_kab_ktp']?></td>
								<td><?=$item['nama_kec_ktp']?></td>
								<td><?=$item['nama_kel_ktp']?></td>
								<td><?=$item['alamat_ktp']?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
