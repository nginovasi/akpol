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
			<h4 align="center" style="text-decoration: underline;" >KARTU RENCANA STUDI (KRS) SEMESTER VI TARUNA TK III / 53</h4>
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
